<?= $this->element('hero/contacthero') ?>

<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
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
							Une question, une suggestion ?
							Envoyez-nous un message, nous vous répondrons dès que possible !
						</p>
					</div>
					<div class="step">
						<?= $this->Flash->render(); ?><br />
						<div id="message-contact"></div>
						<?= $this->Form->create($contact); ?>
						<!--<form method="post" action="assets/contact.php" id="contactform">-->
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
					<div class="box_style_1">
						<span class="tape"></span>
						<h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
						<p>
							Place Charles de Gaulle, 75008 Paris
						</p>
						<hr>
						<h4>Help center <span><i class="icon-help pull-right"></i></span></h4>
						<p>
							Lorem ipsum dolor sit amet, vim id accusata sensibus, id ridens quaeque qui. Ne qui vocent ornatus molestie.
						</p>
						<ul id="contact-info">
							<li>+ 61 (2) 8093 3400 / + 61 (2) 8093 3402</li>
							<li><a href="#">info@domain.com</a>
							</li>
						</ul>
					</div>
					<div class="box_style_4">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>
				</div>
				<!-- End col-md-4 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
		
	</main>
	<!-- End main -->