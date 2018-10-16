<?= $this->element('hero/identityhero') ?>

<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a>
					</li>
					<li>Qui sommes-nous ?
					</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="margin_60 container">
			<div id="tour_guide">
				<p>
					<img src="<?= $this->Url->image('identity.jpg') ?>" alt="L'équipe Green Marseille" class="img-circle styled">
				</p>
				<h2>L'équipe Green Marseille</h2>
				<p class="lead add_bottom_30">
					"Notre objectif ? Contribuer à faire évoluer les comportements de tous les marseillais, pour qu'un jour, la notoriété de notre ville repose aussi sur le développement responsable et l'engagement écocitoyen de ses habitants. Parce qu'ici peut-être plus qu'ailleurs, <strong>on aime notre ville</strong> et la qualité de vie qu'elle nous offre et on a envie de <strong>protéger son patrimoine naturel unique, inestimable mais fragile</strong>"
				</p>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 nopadding features-intro-img">
					<div class="features-bg">
						<div class="features-img">
						</div>
					</div>
				</div>
				<div class="col-md-6 nopadding">
					<div class="features-content">
						<h3>Plus verte la vie !</h3>
						<p>Changer Marseille, cela ne se fera pas en un jour. Mais nous croyons vraiment que nos actions peuvent avoir un impact sur notre ville et que notre futur se joue aujourd'hui, dans nos habitudes de consommation quotidiennes. <br /><strong>C'est pourquoi Marseille Green s'engage auprès des commerces locaux qui prennent part à la lutte contre le réchauffement climatique</strong> et soutient leur action en leur apportant de la visibilité. <br /><br />Changer, c'est possible. Il suffit de le décider ! </p>
						<p>
							<?= $this->Html->link('En savoir plus', ['controller' => 'Pages', 'action' => 'concept'], ['class' => 'btn_1 white']) ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container margin_60">
			<div class="main_title">
				<h2>Nos <span>inspirations</span></h2>
				<p>
					Il existe déjà de nombreuses initiatives à Marseille ! Un petit aperçu de nos personnalités/associations coup de coeur. <br/>
				</p>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="review_strip">
						<img src="img/avatar1.jpg" alt="Image" class="img-circle">
						<h4>Edmund Platt, notre superhéros des déchets</h4>
						<p>
							Avec sa page Facebook <strong>1 Déchet Par Jour / 1 Piece of Rubbish</strong>, ce marseillais d'origine anglaise combat avec une inlassable énergie les forces d'un mal qui ronge Marseille depuis des années : celui des déchets qui encombrent et salissent l'image de la ville. Ses initiatives et ses vidéos sont suivies quotidiennement par presque 20000 personnes !
						</p>
						<p>
						<?= $this->Html->link('Suivre', "https://www.facebook.com/1PieceOfRubbish/", ['class' => 'btn_1 identity', "target" => "_blank"]) ?>	
						</p>
					</div>
					<!-- End review strip -->
				</div>

				<div class="col-md-6">
					<div class="review_strip">
						<img src="img/avatar2.jpg" alt="Image" class="img-circle">
						<h4>Alternatiba Marseille, le changement en action</h4>
						<p>
							<strong>"Changeons le système, pas le climat"</strong> est le projet prometteur de cette association militante, qui porte des alternatives capables de limiter le changement climatique à tous les niveaux de la société. En 2018, le tour Alternatiba, avec ses 5800 km parcourus, est parti à la rencontre de plus de 50 porteurs d'alternative marseillais pour échanger sur des projets concrets autour du climat.
						</p>
						<p>
						<?= $this->Html->link('Suivre', "https://www.facebook.com/alternatiba.marseille/", ['class' => 'btn_1 identity', "target" => "_blank"]) ?>	
						</p>
					</div>
					<!-- End review strip -->
				</div>
			</div>
			<!-- End row -->

			<div class="row">
				<div class="col-md-6">
					<div class="review_strip">
						<img src="img/avatar3.jpg" alt="Image" class="img-circle">
						<h4>Vélos en ville, pour le développement du cyclisme à Marseille</h4>
						<p>
							Parmi de nombreux projets, l'association milite pour <strong>étendre l'aménagement de voies cyclables sur l'espace urbain marseillais</strong> et faire entendre la voix des cyclistes dans une ville où les embouteillages et la pollution automobile sont un fléau connu.
						</p>
						<p>
						<?= $this->Html->link('Suivre', "https://www.facebook.com/VelosEnVille/", ['class' => 'btn_1 identity', "target" => "_blank"]) ?>	
						</p>
					</div>
					<!-- End review strip -->
				</div>

				<div class="col-md-6">
					<div class="review_strip">
						<img src="img/avatar1.jpg" alt="Image" class="img-circle">
						<h4>Marseille Vert, le premier web magazine marseillais 100% écolo</h4>
						<p>
							Marseille Vert est un média qui fonctionne avec des <strong>entreprises partenaires dites "coccinelles"</strong> qui s'engagent pour la planète. Sur le site on trouve les actualités vertes de ces entreprises ainsi que tout ce qu’il se passe d’écolo, de beau, de bon et de bio en général sur la planète.
						</p>
						<p>
						<?= $this->Html->link('Suivre', "https://www.facebook.com/marseillevert/", ['class' => 'btn_1 identity', "target" => "_blank"]) ?>	
						</p>
					</div>
					<!-- End review strip -->
				</div>
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->







		