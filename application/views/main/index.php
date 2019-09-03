<?
if (isset($_SESSION['authorize'])) {
	header('Location: /account/course');
	exit;
} elseif (isset($_SESSION['admin'])) {
	header('Location: /admin/stat');
	exit;
} elseif (isset($_SESSION['moder'])) {
	header('Location: /moder/tasks');
	exit;
}
?>
<section class="content">
	<div class="container add full">
		<div class="row">
			<div class="col">
				<p class="adout">Информационная система «Test-IN» предназначена для сдачи индивидуальных заданий по программированию,<br> и их автоматическому тестированию и оценке.</p>
			</div>
		</div>
	</div>
</section>