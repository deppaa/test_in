<div class="content">
	<section>
		<div class="container user-profile">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<img src="/public/avatarsAccount/<?php echo $data['id']; ?>.jpg" alt="" class="profile-user_foto rounded-circle">
				</div>
				<div class="col-lg-4 col-md-6">
					<h2 class="profile-user_name"><?php echo $data['surname'] . ' ' . $data['name'] . ' ' . $data['pat']; ?></h2>
					<div class="profile-user_university">
						<h3>Вуз: <?php echo $data['vuz']; ?></h3>
					</div>
					<div class="profile-user_groop">
						<h3>Номер группы: <?php echo $data['group_name']; ?></h3>
					</div>
					<a class="btn btn-success float-right" href="/account/edit">Редактировать</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<!--<div class= "profil e -user_bestandba d">
						<div class= "profil e -beas t">
							<h4 class= "profil e -beast_tex t">Решено верно</h4>
							<progress value= "1 0" max= "10 0"></progress>
							<span class= "progres s -valu e">10/100</span>
						</div>
						<div class= "profil e -ba d">
							<h4 class= "profil e -bad_tex t">Решено не верно</h4>
							<progress class= "profil e -bad_progres s" value= "1 0" max= "10 0"></progress>
							<span class= "progres s -valu e">10/100</span>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container user-statistic">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<h2 class="profile-stat_text">Общий рейтинг</h2>
					<progress class="lineshem" max="100" value="<?php echo $personalCoursProgres; ?>"></progress>
					<span class="progress-value"><?php echo $personalCoursProgres; ?>/100%</span>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</section>
	<section>
		<div class="container user-circle">
			<h2 class="profile-circle_text">Рейтинг по курсу</h2>
			<div class="row">
				<?php if (empty($coursDataProgres)) : ?>
					<p>Список курсов пуст</p>
				<?php else : ?>
					<?php foreach ($coursDataProgres as $val) : ?>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="content_block_profile">
								<!--<div class="dial blue" data-width="180" data-lineWidth="41"></div>-->
								<svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
									<circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
									<circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#d2d3d4" stroke-width="3"></circle>
									<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#1390d4" stroke-width="3" stroke-dasharray="<?php echo $val['ball']; ?> <?php echo 100 - $val['ball']; ?>" stroke-dashoffset="0"></circle>
									<text x="50%" y="60%" class="dial-text"><?php echo $val['ball']; ?>%</text>
								</svg>
								<h2 class="content_block_info-title"><?php echo $val['name']; ?></h2>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>