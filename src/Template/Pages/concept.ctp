<?= $this->element('hero/concepthero') ?>

<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a>
					</li>
					<li>Concept
					</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">

			<div class="main_title">
				<h2>Comment ça <span>marche</span> ?</h2>
				<p>Libérez votre nature : votre quotidien à Marseille, mais en plus vert</p>
			</div>

			<div class="row">
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
					<div class="feature">
						<i class="icon_set_1_icon-49"></i>
						<h3>Plus de <span>100 spots...</span></h3>
						<p>
							Etre plus écolo au quotidien, vous aimeriez bien, mais vous ne savez pas comment faire ? Pas envie de vous compliquer la vie ou d'y passer du temps ? Ca tombe bien, on vous a mâché le travail ! Nos "spots", ce sont <strong>tous nos commerces Green préférés à Marseille</strong>, sélectionnés pour vous avec soin afin de vous aider à réduire votre impact sur l'environnement.
						</p>
					</div>
				</div>
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
					<div class="feature">
						<i class="icon_set_1_icon-78"></i>
						<h3>... répartis en <span>8 catégories</span></h3>
						<p>
							Classés en fonction de vos besoins de consommation de tous les jours, nous avons réparti les spots en 8 catégories : <strong>magasins bio, épiceries vrac, paniers locaux, boulangeries d'antan, restos bio et/ou vegan, soins naturels, recyclage & zéro déchet, et shopping made in France</strong>. Tous vos achats les plus courants sont couverts !
						</p>
					</div>
				</div>
			</div>
			<!-- End row -->
			<div class="row">
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
					<div class="feature">
						<i class="icon_set_1_icon-41"></i>
						<h3>Tout <span>localiser</span>  en un coup d'oeil</h3>
						<p>
							<strong>Notre carte interactive géolocalise la liste complète de nos spots</strong>, et vous permet de visualiser rapidement tous les commerces proches de chez vous. Sur la page du spot qui vous intéresse, vous allez pouvoir obtenir votre itinéraire en rentrant directement votre adresse. On vous a aussi indiqué les transports en commun disponibles, et plein d'autres infos utiles :)
						</p>
					</div>
				</div>
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
					<div class="feature">
						<i class="icon_set_1_icon-70"></i>
						<h3>Votre espace <span>Green</span> </h3>
						<p>
							En vous connectant à votre espace utilisateur, vous avez accès à votre <strong>Carnet d'appréciations</strong>, qui regroupe les notes et les avis que vous avez déjà déposés sur nos spots. Vous pouvez ainsi retrouver vos spots favoris, revoir ceux que vous avez testés et si vous le souhaitez, supprimer vos avis passés pour en déposer de nouveaux. De nouvelles fonctionnalités sont aussià venir !
						</p>
					</div>
				</div>
			</div>
			<!-- End row -->

		</div>
		<!-- End container -->

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 nopadding features-intro-img">
					<div class="features-bg">
						<div class="features-img"></div>
					</div>
				</div>
				<div class="col-md-6 nopadding">
					<div class="features-content">
						<h3>Plus verte la vie !</h3>
						<p>Changer Marseille, cela ne se fera pas en un jour. Mais nous croyons vraiment que nos actions peuvent avoir un impact sur notre ville et que notre futur se joue aujourd'hui, dans nos habitudes de consommation quotidiennes. <br /><strong>C'est pourquoi Marseille Green s'engage auprès des commerces locaux qui prennent part à la lutte contre le réchauffement climatique</strong> et soutient leur action en leur apportant de la visibilité. <br /><br />Changer, c'est possible. Il suffit de le décider ! </p>
						<p><?= $this->Html->link('J\'y vais', ['controller' => 'Spots', 'action' => 'all'], ['class' => 'btn_1 white']) ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End container-fluid  -->

		<div class="container margin_60">

			<!-- End row -->

				<div class="col-md-6 col-sm-6 hidden-xs">
					<img src="<?= $this->Url->image('laptop.png') ?>" alt="Laptop" class="img-responsive laptop">
				</div>
				<div class="col-md-6 col-sm-6">
					<h3>Participer à la communauté <span>Marseille Green</span></h3>
					<p>Pour garantir une expérience de qualité chez nos partenaires et agrandir notre réseau en proposant <strong>les meilleurs plans écolo de Marseille</strong>, nous avons besoin de vous !</p>
					<ul class="list_order">
						<li><span>1</span>Choisissez vos commerces préférés dans notre liste 100% nature</li>
						<li><span>2</span>Testez !</li>
						<li><span>3</span>Donnez votre avis et notez votre expérience</li>
					</ul>
					<?= $this->Html->link('C\'est parti', ['controller' => 'Spots', 'action' => 'all'], ['class' => 'btn_1']) ?>
				</div>

			<!-- End row -->
		</div>
		<!-- End Container -->
	</main>