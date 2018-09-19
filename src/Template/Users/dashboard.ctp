<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Accueil</a>
					</li>
					<li>Espace utilisateur</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="margin_60 container">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-booking"><span>Mon carnet d'appréciations</span></a>
						</li>
						<li><a href="#section-3" class="icon-settings"><span>Paramètres</span></a>
						</li>
						<li><a href="#section-4" class="icon-profile"><span>Mon profil</span></a>
						</li>
					</ul>
				</nav>
				<div class="content">

					<section id="section-1">
						<!--<div id="tools">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="styled-select-filters">
										<select name="sort_type" id="sort_type">
											<option value="" selected>Sort by type</option>
											<option value="tours">Tours</option>
											<option value="hotels">Hotels</option>
											<option value="transfers">Transfers</option>
										</select>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="styled-select-filters">
										<select name="sort_date" id="sort_date">
											<option value="" selected>Sort by date</option>
											<option value="oldest">Oldest</option>
											<option value="recent">Recent</option>
										</select>
									</div>
								</div>
							</div>
						</div>-->
						<!--/tools -->

						<?php foreach ($review as $review): ?>
						<div class="strip_booking">
							<div class="row">
								<div class="col-md-2 col-sm-2">
									<div id="dashboardthumb"><?php echo $this->Html->image($review->spot->imagethumb, ['alt' => 'Image', 'url' => ['controller' => 'Spots', 'action' => 'view', $review->spot->slug]]); ?>

									

									</div>
								</div>
								<div class="col-md-6 col-sm-5"><?= $this->Flash->render(); ?>
									<h3><?= $review->title ?></h3>
									<blockquote class="styled"><?= $review->content ?></blockquote>
								</div>
								<div class="col-md-2 col-sm-3">
									<ul class="info_booking">
										<li><strong>Note</strong><div class="rating" id="dashboardrating">	
										<?php for ($i = 1; $i <= 5; $i++) {
											if ($i <= $review->rating)
											{
												echo "<i class=\"icon-smile voted\"></i>";
											}
											else
											{
												echo "<i class=\"icon-smile\"></i>";
											}
										} ?>
										</div></li><br />
										<li><strong>Spot</strong> <?php echo $this->Html->link($review->spot->name, ['controller' => 'Spots', 'action' => 'view', $review->spot->slug]) ?></li><br />

										<li><strong>Quartier</strong> <?= $review->spot->area ?></li><br />
										<li><strong>Date</strong> <?= $review->created->format('d M y') ?></li>
									</ul>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="booking_buttons">
										<!--<a href="#0" class="btn_2">Modifier</a>-->
										<?= $this->Html->link('Voir l\'avis', ['controller' => 'Spots', 'action' => 'view', $review->spot->slug], ['class' => 'btn_2']) ?>
										<?= $this->Form->postLink(__('Supprimer l\'avis'),
											
											['action' => 'deleteReview', $review->id],
											['class' => 'btn_3']
											//['confirm' => __('Etes vous sûr de vouloir supprimer cet avis (#{0})?', $review->id)]
										); ?>
										
									</div>
								</div>
								
							</div>
							<!-- End row -->
						</div>
						<!-- End strip booking -->
						<?php endforeach; ?>

					</section>
					<!-- End section 1 -->

					<section id="section-3">
						<div class="row">
							<div class="col-md-6 col-sm-6 add_bottom_30">
								<h4>Mettre à jour votre nom d'utilisateur</h4>
								<strong>Nom d'utilisateur actuel</strong><br /><?= $userlogin ?>
								<?= $this->Form->create($user, ['url' => ['action' => 'editUser']]); ?>
								<div class="form-group">
									<label>Nouveau nom d'utilisateur</label>
									<?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Votre nouveau pseudo', 'label' => false]) ?>
								</div>
								<button type="submit" class="btn_1 green">Mettre à jour</button>
								<?= $this->Form->end() ?>
								
							</div>
							<div class="col-md-6 col-sm-6 add_bottom_30">
								<h4>Change your email</h4>
								<div class="form-group">
									<label>Old email</label>
									<input class="form-control" name="old_password" id="old_password" type="password">
								</div>
								<div class="form-group">
									<label>New email</label>
									<input class="form-control" name="new_password" id="new_password" type="password">
								</div>
								<div class="form-group">
									<label>Confirm new email</label>
									<input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
								</div>
								<button type="submit" class="btn_1 green">Update Email</button>
							</div>
						</div>
						<!-- End row -->

						<hr>
						<h4>Upload profile photo</h4>
						<div class="form-inline upload_1">
							<div class="form-group">
								<input type="file" name="files[]" id="js-upload-files" multiple>
							</div>
							<button type="submit" class="btn_1 green" id="js-upload-submit">Upload file</button>
						</div>
						<hr>
							<button type="submit" class="btn_1 green">Update Profile</button>

					</section>
					<!-- End section 3 -->

					<section id="section-4">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<h4>Profil</h4>
								<ul id="profile_summary">
									<li>Nom d'utilisateur <span><?= $user->username ?></span>
									</li>
									<li>Prénom <span>Clara</span>
									</li>
									<li>Last name <span>Tomson</span>
									</li>
									<li>Phone number <span>+00 032 42366</span>
									</li>
									<li>Date of birth <span>13/04/1975</span>
									</li>
									<li>Street address <span>24 Rue de Rivoli</span>
									</li>
									<li>Town/City <span>Paris</span>
									</li>
									<li>Zip code <span>002843</span>
									</li>
									<li>Country <span>France</span>
									</li>
								</ul>
							</div>
							<div class="col-md-6 col-sm-6">
								<img src="img/tourist_guide_pic.jpg" alt="Image" class="img-responsive styled profile_pic">
								</p>
							</div>
						</div>
						<!-- End row -->

						<div class="divider"></div>

						<div class="row">
							<div class="col-md-12">
								<h4>Edit profile</h4>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>First name</label>
									<input class="form-control" name="first_name" id="first_name" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Last name</label>
									<input class="form-control" name="last_name" id="last_name" type="text">
								</div>
							</div>
						</div>
						<!-- End row -->

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Phone number</label>
									<input class="form-control" name="email_2" id="email_2" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Date of birth <small>(dd/mm/yyyy)</small>
									</label>
									<input class="form-control" name="email" id="email" type="text">
								</div>
							</div>
						</div>
						<!-- End row -->

						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>Edit address</h4>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Street address</label>
									<input class="form-control" name="first_name" id="first_name" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>City/Town</label>
									<input class="form-control" name="last_name" id="last_name" type="text">
								</div>
							</div>
						</div>
						<!-- End row -->

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Zip code</label>
									<input class="form-control" name="email" id="email" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Country</label>
									<select id="country" class="form-control" name="country">
										<option value="">Select...</option>
									</select>
								</div>
							</div>
						</div>
						<!-- End row -->

						<hr>
						<h4>Upload profile photo</h4>
						<div class="form-inline upload_1">
							<div class="form-group">
								<input type="file" name="files[]" id="js-upload-files" multiple>
							</div>
							<button type="submit" class="btn_1 green" id="js-upload-submit">Upload file</button>
						</div>

						<!-- Hidden on mobiles -->
						<div class="hidden-xs">
							<!-- Drop Zone -->
							<h5>Or drag and drop files below</h5>
							<div class="upload-drop-zone" id="drop-zone">
								Just drag and drop files here
							</div>
							<!-- Progress Bar -->
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<!-- Upload Finished -->
							<div class="js-upload-finished">
								<h5>Processed files</h5>
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
								</div>
							</div>
							<!-- End Hidden on mobiles -->

							<hr>
							<button type="submit" class="btn_1 green">Update Profile</button>
					</section>
					<!-- End section 4 -->

					</div>
					<!-- End content -->
				</div>
				<!-- End tabs -->
			</div>
			<!-- end container -->