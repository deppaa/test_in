var count = $("#count").val();
console.log(count);
$(document).ready(function () {
	$("#add-task-js").click(function () {
		count++;
		var newLi = document.createElement('div');
		var allhtml = '<div class="add-task">\
							<div class="form-group">\
								<h2>Задание ' + count + '</h2>\
								</div><div class="form-group">\
									<input class="form-control add-task_bal" type="text" placeholder="Вес задания" name="task-ball' + count + '">\
								</div>\
								<div class="form-group">\
									<input class="form-control" type="text" placeholder="Название" name="task-title' + count + '">\
								</div>\
								<div class="form-group">\
									<textarea class="form-control add-task_desc" placeholder="Текст задания" name="task-text' + count + '"></textarea>\
								</div>\
								<div class="form-group">\
									<h3>Тест 1</h3>\
								</div>\
								<div class="add-task_test d-flex">\
									<div class="form-group">\
										<textarea class="form-control" placeholder="Входные данные" name="input-text1-' + count + '"></textarea>\
									</div>\
									<div class="form-group">\
										<textarea class="form-control" placeholder="Выходные данные" name="output-text1-' + count + '"></textarea>\
									</div>\
								</div>\
								<div class="form-group">\
									<h3>Тест 2</h3>\
								</div>\
								<div class="add-task_test d-flex">\
									<div class="form-group">\
										<textarea class="form-control" placeholder="Входные данные" name="input-text2-' + count + '"></textarea>\
									</div>\
									<div class="form-group">\
										<textarea class="form-control" placeholder="Выходные данные" name="output-text2-' + count + '"></textarea>\
									</div>\
								</div>\
								<div class="form-group">\
									<h3>Тест 3</h3>\
								</div>\
								<div class="add-task_test d-flex">\
									<div class="form-group">\
										<textarea class="form-control" placeholder="Входные данные" name="input-text3-' + count + '"></textarea>\
									</div>\
									<div class="form-group">\
										<textarea class="form-control" placeholder="Выходные данные" name="output-text3-' + count + '"></textarea>\
									</div>\
								</div>\
						</div>';
		newLi.innerHTML += allhtml;
		list.insertBefore(newLi, list.children[count]);
		$("#count").val(count);
	});
});

$(document).ready(function () {
	$("#del-task-js").click(function () {
		if (count > 1) {
			list.removeChild(list.lastChild);
			count--;
			$("#count").val(count);
		}
	});
});