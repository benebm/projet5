<?= $this->element('hero/dashboardhero') ?>

<main>
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a>
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
					<li><a href="#section-2" class="icon-settings"><span>Paramètres</span></a>
					</li>
					<li><a href="#section-3" class="icon-profile"><span>Profil</span></a>
					</li>
				</ul>
			</nav>
			<div class="content">
				<section id="section-1">
					<?= $this->Flash->render(); ?><br />
					<?php if ($review->isEmpty())
					{
						echo "Vous n'avez pas encore publié d'appréciations. " . $this->Html->link('Lancez-vous !', ['controller' => 'Spots', 'action' => 'all']);
					}
					else
					{
						foreach ($review as $review): ?>
						<div class="strip_booking">
							<div class="row">
								<div class="col-md-2 col-sm-2">
									<div id="dashboardthumb"><?php echo $this->Html->image($review->spot->imagethumb, ['alt' => $review->spot->name, 'url' => ['controller' => 'Spots', 'action' => 'view', $review->spot->slug]]); ?>
									</div>
								</div>
							<div class="col-md-6 col-sm-5">
								<h3><?= $review->title ?></h3>
								<blockquote class="styled"><?= $review->content ?></blockquote>
							</div>
							<div class="col-md-2 col-sm-3">
								<ul class="info_booking">
									<li><strong>Note</strong>
										<div class="rating" id="dashboardrating">	
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
										</div>
									</li><br />
									<li><strong>Spot</strong> <?php echo $this->Html->link($review->spot->name, ['controller' => 'Spots', 'action' => 'view', $review->spot->slug]) ?>
									</li><br />
									<li><strong>Quartier</strong> <?= $review->spot->area ?></li><br />
									<li><strong>Date</strong> <?= $review->created->format('d M y') ?></li>
								</ul>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="booking_buttons">
									<!--<a href="#0" class="btn_2">Modifier</a>-->
									<?= $this->Html->link('Voir l\'avis', ['controller' => 'Spots', 'action' => 'view', $review->spot->slug], ['class' => 'btn_2']) ?>
									<?= $this->Form->postLink(__('Supprimer l\'avis'), ['action' => 'deleteReview', $review->id], ['class' => 'btn_3']); ?>
								</div>
							</div>
						</div>
						<!-- End row -->
					</div>
					<!-- End strip booking -->
					<?php endforeach; 
					}?>
				</section>
				<!-- End section 1 -->

				<section id="section-2">
					<div class="row">
						<div class="col-md-6 col-sm-6 add_bottom_30">
							<h4>Mettre à jour votre nom d'utilisateur</h4>
							<strong>Nom d'utilisateur actuel</strong><br /><?= h($username) ?>
							<hr>
							<?= $this->Form->create(isset($user), ['url' => ['action' => 'editUser']]); ?>
								<div class="form-group">
								<label>Nouveau nom d'utilisateur</label>
								<?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Votre nouveau pseudo', 'label' => false]) ?>
								</div>
								<button type="submit" class="btn_1 green">Mettre à jour</button>
							<?= $this->Form->end() ?>				
						</div>
						<div class="col-md-6 col-sm-6 add_bottom_30">
							<h4>Mettre à jour votre mot de passe</h4>
							<?= $this->Form->create(isset($user), ['url' => ['action' => 'editUser']]); ?>
								<div class="form-group">
								<label>Nouveau mot de passe</label>
								<?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Votre nouveau mot de passe', 'label' => false, 'id' => 'password1']) ?>
								<br />
								<label>Saisissez à nouveau le mot de passe</label>
								<?= $this->Form->password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Votre nouveau mot de passe', 'label' => false, 'id' => 'password2']) ?>
								</div>
								<div id="pass-info" class="clearfix"></div>
								<button type="submit" class="btn_1 green">Mettre à jour</button>
							<?= $this->Form->end() ?>	
						</div>
						<!-- End row -->
				</section>
				<!-- End section 2 -->

				<section id="section-3">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<h4>Votre photo de profil</h4>
						</div>
						<div class="col-md-6 col-sm-6">
								<?php if (isset($ext))
									{	
   									echo $this->Html->image('avatars/avatar_' . $userId . '.' . $ext, [
									'alt' => $username, 
									'class' => 'img-responsive styled profile_pic'
									]);
									}
								else
									{
									echo $this->Html->image('default-avatar.png', [
									'alt' => $username, 
									'class' => 'img-responsive styled profile_pic'
									]);
									} 
								?>
							</p>
						</div>
					</div>
					<!-- End row -->
					<hr>
					<h4>Importer une photo de profil</h4>
					<div class="form-inline upload_1">
						<div class="form-group">
							<?php 
							echo $this->Form->create(isset($photo), [
								'url' => ['action' => 'addPhoto'],
								'enctype' => 'multipart/form-data'
							]);
							echo $this->Form->input('upload', [
								'type' => 'file',
								'label' => 'Dimensions : 68 x 68 pixels | Formats acceptés gif, jpg, png | Poids max 10 Ko'
							]); ?>
							<br />
							<?= $this->Form->button('Mettre à jour ma photo de profil', ['class' => 'btn_1 green']);
							echo $this->Form->end();  
							?>	
						</div>
					</div>		
				</section>
				<!-- End section 3 -->

			</div>
			<!-- End content -->
		</div>
		<!-- End tabs -->
	</div>
	<!-- end container -->
</main>
<!-- End main -->