<?= $this->element('hero/contacthero') ?>

<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a>
					</li>
					<li>Contact
					</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="form_title">
						<h3><strong><i class="icon-pencil"></i></strong>Nous contacter</h3>
						<p>
							Votre avis nous intéresse.
							Envoyez-nous un message, nous vous répondrons dès que possible !
						</p>
					</div>
					<div class="step">
						<?= $this->Flash->render(); ?><br />
						<div id="message-contact"></div>
						<?= $this->Form->create($contact); ?>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<?= $this->Form->control('firstname', ['class' => 'form-control', 'placeholder' => 'Votre prénom', 'label' => 'Prénom', 'id' => 'name_contact']) ?>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<?= $this->Form->control('lastname', ['class' => 'form-control', 'placeholder' => 'Votre nom', 'label' => 'Nom', 'id' => 'lastname_contact']) ?>
									</div>
								</div>
							</div>
							<!-- End row -->
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'votrenom@exemple.fr', 'label' => 'Votre email', 'id' => 'email_contact']) ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<?= $this->Form->textarea('body', ['class' => 'form-control', 'placeholder' => 'Ecrivez ici', 'label' => 'Votre message', 'id' => 'message_contact', 'rows' => '5']) ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="submit" value="Envoyer" class="btn_1" id="submit-contact">
									<?= $this->Form->end(); ?>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End col-md-8 -->

				<div class="col-md-4 col-sm-4">
					<div class="box_style_4">
						<i class="icon_set_1_icon-57"></i>
						<h4>Utilisez le <span>formulaire</span><br /> ou envoyez un <span>email</span> à :</h4>
						contact@marseillegreen.fr
					</div>
				</div>
				<!-- End col-md-4 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
		
	</main>
	<!-- End main -->