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
				<p>Libérez votre nature : tout pour votre quotidien à Marseille, mais en plus vert</p>
			</div>

			<div class="row">
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
					<div class="feature">
						<i class="icon_set_1_icon-30"></i>
						<h3>+ de 100 <span>Spots</span></h3>
						<p>
							Etre plus écolo au quotidien, vous aimeriez bien, mais vous ne savez pas comment faire ? Pas envie de se compliquer la vie ou d'y passer du temps ? Vous êtes au bon endroit avec notre sélection de spots GREEN. Un spot, c'est un de nos endroits préférés 
						</p>
					</div>
				</div>
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
					<div class="feature">
						<i class="icon_set_1_icon-41"></i>
						<h3>Tout <span>localiser</span> en un coup d'oeil</h3>
						<p>
							Notre carte interactive vous montre tous les quartiersLorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
						</p>
					</div>
				</div>
			</div>
			<!-- End row -->
			<div class="row">
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
					<div class="feature">
						<i class="icon_set_1_icon-57"></i>
						<h3>Votre espace <span>Green</span></h3>
						<p>
							Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
						</p>
					</div>
				</div>
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
					<div class="feature">
						<i class="icon_set_1_icon-61"></i>
						<h3><span>8 catégories</span> pour plus de choix</h3>
						<p>
							Nourriture, sport, loisirs : tout est à disposition !
						</p>
					</div>
				</div>
			</div>
			<!-- End row -->
			<div class="row">
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
					<div class="feature">
						<i class="icon_set_1_icon-57"></i>
						<h3>Le label <span>Green</span></h3>
						<p>
							Partenaires privilégiés, testés et approuvés, assurance de qualité. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
						</p>
					</div>
				</div>
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
					<div class="feature">
						<i class="icon_set_1_icon-61"></i>
						<h3><span>Les offres spéciales négociées pour vous</span> pour plus de choix</h3>
						<p>
							Badge sur le spot : promo pour les clients qui viennent par Green
						</p>
					</div>
				</div>
			</div>
			<!-- End row -->
			<hr>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<h4>Tous les services en un coup d'oeil pour vous faciliter la vie</h4>
					<p>Etre plus écolo au quotidien, vous aimeriez bien, mais vous ne savez pas comment faire ? Pas envie de se compliquer la vie ou d'y passer du temps ? <a href="#">utamur antiopam inciderint</a> sed.</p>
					<div class="general_icons">
						<ul>
							<li><i class="icon_set_1_icon-59"></i>Breakfast</li>
							<li><i class="icon_set_1_icon-8"></i>Dinner</li>
							<li><i class="icon_set_1_icon-32"></i>Photo collection</li>
							<li><i class="icon_set_1_icon-50"></i>Personal shopper</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Notre ambition : un futur plus vert pour Marseille</h4>
					<p>Avec le soutien de notre communauté, notre site est amené à évoluer avec le lancement de nouveaux projets comme un agenda d'évènements locaux, un blog regroupantet de s. Et pourquoi pas, à terme, le développement du concept sur d'autres villes! </p>
					<div class="general_icons">
						<ul>
							<li><i class="icon_set_1_icon-98"></i>Audio guide</li>
							<li><i class="icon_set_1_icon-27"></i>Parking</li>
							<li><i class="icon_set_1_icon-36"></i>Exchange</li>
							<li><i class="icon_set_1_icon-63"></i>Mobile</li>
						</ul>
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