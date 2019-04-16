<div class="content">
	<section>
		<div class="container task-text">
			<div class="row">
				<div class="col">
					<h2>Задача «<?php echo $task['title']; ?>»</h2>
					<h3>Условие:</h3>
					<h3><?php echo $task['text']; ?></h3>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container task-ide">
			<div class="row">
				<div class="col">
					<div class="edit">
						<button id="run"><i class="fas fa-play"></i></button>
						<button id=""><i class="fas fa-undo-alt"></i></button>
						<button class=""><i class="fas fa-redo-alt"></i></button>
					</div>
					<textarea name="code" class="code" id="code"><?php echo $structure['contents']; ?></textarea>
					<div class="d-flex inout">
						<div>
							<h3>Входные данные:</h3>
							<textarea id="input"></textarea>
						</div>
						<div>
							<h3>Выходные данные:</h3>
							<textarea id="output"></textarea>
						</div>
					</div>
					<div class="error">
						<h3>Список ошибок</h3>
						<div>
							<p id="err"></p>
							<p id="War"></p>
							<p id="Stat"></p>
						</div>
					</div>  
					<div class="run-test">
						<button id="goall" class="run-test_button btn btn-sm btn-default open-button">Проверить решение на всех тестах</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container task-result">
			<div class="row task-info">
				<div class="col-md-2"></div>            
				<div class="col-md-1">
					<h3>№</h3>
				</div>
				<div class="col-md-2">
					<h3>Входные данные</h3>
				</div>
				<div class="col-md-2">
					<h3>Что вывела программа</h3>
				</div>
				<div class="col-md-2">
					<h3>Правильный ответ</h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-1"></div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-2"></div>            
				<div class="col-md-1">
					<h3>Тест 1</h3>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="in1"><?php echo $task['test1_in']; ?></textarea>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="out1"></textarea>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="true1"><?php echo $task['test1_out']; ?></textarea>
				</div>
				<div class="col-md-2">
					<div id="inf1"></div>
				</div>
				<div class="col-md-1"></div>
			</div>

			<div class="row">
				<div class="col-md-2"></div>            
				<div class="col-md-1">
					<h3>Тест 2</h3>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="in2"><?php echo $task['test2_in']; ?></textarea>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="out2"></textarea>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="true2"><?php echo $task['test2_out']; ?></textarea>
				</div>
				<div class="col-md-2">
					<div id="inf2"></div>
				</div>
				<div class="col-md-1"></div>
			</div>

			<div class="row">
				<div class="col-md-2"></div>            
				<div class="col-md-1">
					<h3>Тест 3</h3>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="in3"><?php echo $task['test3_in']; ?></textarea>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="out3"></textarea>
				</div>
				<div class="col-md-2">
					<textarea disabled="disabled" class="all-test" id="true3"><?php echo $task['test3_out']; ?></textarea>
				</div>
				<div class="col-md-2">
					<div id="inf3"></div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
</div>
<div class="modal-overlay closed" id="modal-overlay"></div>
<div class="modal rounded closed" id="modal" aria-hidden="true" aria-labelledby="modalTitle" aria-describedby="modalDescription" role="dialog">
	<div class="modal-guts" role="document">
		<img src="/public/img/load1.gif" width="100" alt="Загрузка">
	</div>
</div>