<section class="content">
	<div class="container moder-ide">
		<div class="row">
			<div class="col">
				<?php if (empty($code)): ?>
					<p>Файл не найден</p>
					<?php else: ?>
						<textarea class="code" id="code"><?php echo $code['contents']; ?></textarea>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
