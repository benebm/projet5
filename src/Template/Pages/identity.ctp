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
					<img src="<?= $this->Url->image('tourist_guide_pic.jpg') ?>" alt="Image" class="img-circle styled">
				</p>
				<h2>Madlene - Certified tourist guide</h2>
				<p class="lead add_bottom_30">
					"Eu tota moderatius usu, ad putant aliquando constituam ius, <strong>commodo sententiae</strong> suscipiantur nam eu. Tamquam nominati abhorreant at vis, has id harum melius petentium. Mea wisi debet omnium ne, est ea graecis noluisse recusabo, denique deterruisset ius et."
				</p>
			</div>
			<div class="row">
				<div class="col-md-8">
					<h3>Some words about me</h3>
					<p>
						Lorem ipsum dolor sit amet, ex justo nominavi eum, cu veniam salutatus reprimique quo, nisl virtute meliore ei eos. Quaestio consequat sed no, urbanitas honestatis ei usu. Ex nec aliquid appetere petentium, ei eum soleat possim. Has ea omnes prompta. Vel te magna voluptaria, cu nec fabulas voluptatum, has et dictas quaeque labores. Qui ex mazim sadipscing.
					</p>
					<h5>Education</h5>
					<p>
						Lorem ipsum dolor sit amet, ex justo nominavi eum, cu veniam salutatus reprimique quo, nisl virtute meliore ei eos. Quaestio consequat sed no, urbanitas honestatis ei usu. Ex nec aliquid appetere petentium, ei eum soleat possim. Has ea omnes prompta. Vel te magna voluptaria, cu nec fabulas voluptatum, has et dictas quaeque labores. Qui ex mazim sadipscing.
					</p>
					<h5>Past experiences</h5>
					<p>
						Lorem ipsum dolor sit amet, ex justo nominavi eum, cu veniam salutatus reprimique quo, nisl virtute meliore ei eos. Quaestio consequat sed no, urbanitas honestatis ei usu. Ex nec aliquid appetere petentium, ei eum soleat possim. Has ea omnes prompta. Vel te magna voluptaria, cu nec fabulas voluptatum, has et dictas quaeque labores. Qui ex mazim sadipscing.
					</p>
				</div>
				<div class="col-md-4">
					<h3>Spoken languages</h3>
					<p>
						Eu tota moderatius usu, ad putant aliquando constituam ius, commodo sententiae suscipiantur nam eu.
					</p>
					<p>
						<img src="img/lang_en.png" width="40" height="26" alt="Image" data-retina="true"> <img src="img/lang_fr.png" width="40" height="26" alt="Image" data-retina="true">
						<img src="img/lang_de.png" width="40" height="26" alt="Image" data-retina="true"> <img src="img/lang_es.png" width="40" height="26" alt="Image" data-retina="true">
					</p>
					<h3><i class=""></i>Certificates</h3>
					<p>
						Eu tota moderatius usu, ad putant aliquando constituam ius, commodo sententiae suscipiantur nam eu.
					</p>
					<ul class="list_ok">
						<li>Putant aliquando constituam</li>
						<li>Commodo sententiae</li>
						<li>Denique deterruisset</li>
						<li>Putant aliquando constituam</li>
					</ul>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
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
	</main>
	<!-- End main -->