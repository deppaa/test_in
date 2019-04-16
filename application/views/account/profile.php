<div class="content">
		<section>
			<div class="container user-profile">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<img src="/public/avatarsAccount/<?php echo $data['id']; ?>.jpg" alt="" class="profile-user_foto rounded-circle">
					</div>
					<div class="col-lg-4 col-md-6">
						<h2 class="profile-user_name"><?php echo $data['surname'].' '.$data['name'].' '.$data['pat']; ?></h2>
						<div class="profile-user_university">
							<h3>Вуз: <?php echo $data['vuz']; ?></h3>
						</div>    				
						<div class="profile-user_groop">
							<h3>Номер группы: <?php echo $data['group_name']; ?></h3>
						</div>
						<input class="btn btn-success float-right" type="submit" value="Редактировать" name="update-profile-info">						
					</div>
						<div class="col-lg-4 col-md-6">
							<div class="profile-user_bestandbad">
								<div class="profile-beast">
									<h4 class="profile-beast_text">Решено верно</h4>
									<progress value="10" max="100"></progress>
									<span class="progress-value">10/100</span>
								</div>
								<div class="profile-bad">
									<h4 class="profile-bad_text">Решено не верно</h4>
									<progress class="profile-bad_progress" value="10" max="100"></progress>
									<span class="progress-value">10/100</span>
								</div>
							</div>
						</div>
					</div>    		
				</div>
		</section>
		<section>
			<div class="container user-statistic">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h2 class="profile-stat_text">Личные задания</h2>
						<progress class="lineshem" value="10" max="100"></progress>
						<span class="progress-value">10/100</span>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</section>
		<section>
			<div class="container user-circle">
				<h2 class="profile-circle_text">Рейтинг по курсу</h2>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">56</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">24</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">64</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">78</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">12</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">45</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="content_block_profile">
							<div class="dial blue" data-width="180" data-lineWidth="41">89</div>
							<h2 class="content_block_info-title">Название</h2>
						</div>
					</div>
				</div>			
			</div>
		</section>
	</div>