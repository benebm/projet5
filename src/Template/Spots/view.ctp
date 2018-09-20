<main>
<?= $this->element('hero/viewhero') ?>

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Accueil</a>
					</li>
					<li><a href="#">Catégorie</a>
					</li>
					<li>
						<?= $spot->category->title ?>
					</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
			<script>
				var longitude = <?= $spot->position_lng ?>;
				var latitude = <?= $spot->position_lat ?>;
				var name = <?= $spot->name ?>;
			</script>
		</div>
		<!-- End Map -->

<div class="container margin_60">
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">

					<div id="single_tour_feat">
						<ul>
							<?= $spot->iconlist ?>
						</ul>
					</div>

					<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">Voir sur la carte</a>
					</p>
					<!-- Map button for tablets/mobiles -->

					<div class="row">
						<div class="col-md-3">
							<h3>Tout savoir sur ce spot</h3>
						</div>
						<div class="col-md-9">
							<h4>En bref</h4>
							<p>
								<?= $spot->description ?>
							</p>
							<h4>Green aime...</h4>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<ul class="list_ok">
										<?= $spot->likelist ?>
									</ul>
								</div>
							</div>
							<!-- End row  -->
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-3">
							<h3>Appréciations </h3>
						</div>
						<div class="col-md-9">
						<i><?= $this->Flash->render(); ?><br /></i>

							<?= $this->Form->create($review, ['url' => ['action' => 'addReview']]); ?>
                				<div class="form-group">
                    				<?= $this->Form->control('title', ['class' => 'form-control', 'placeholder' => 'Votre titre', 'label' => false]) ?>
                				</div>
                				<?= $this->Form->control('username', ['type' => 'hidden', 'value' => $username]) ?>

            					<?= $this->Form->control('spot_id', ['type' => 'hidden', 'value' => $spot->id]) ?>
            					<?= $this->Form->control('spot_slug', ['type' => 'hidden', 'value' => $spot->slug]) ?>
        						<div class="form-group">
            						<?= $this->Form->control('content', ['class' => 'form-control', 'placeholder' => 'Votre commentaire', 'label' => false]) ?>
        						</div>
        						<div class="form-group">
            						<?= $this->Form->control('rating', ['class' => 'form-control', 'placeholder' => 'Votre note', 'label' => false]) ?>
        						</div>
        						<div class="form-group">
            					<button type="submit" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Laisser un avis</button>
        						</div>
        						<?= $this->Form->end(); ?>

							<?php if ($spot->reviews): ?>
							<div id="general_rating"><?= count($spot->reviews) ?> Appréciations
								<!--<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>-->
							</div>
							<!-- End general_rating -->
							<hr>

							<?php foreach ($spot->reviews as $review): ?>
							<div class="review_strip_single">
								<!--<img src="img/avatar1.jpg" class="img-circle">-->
								<?php echo $this->Html->image("avatar1.jpg", ["class" => "img-circle"]); ?>
								 <small>Publié par <?= $review->username ?><br />- le <?= $review->created->format('d M y') ?> -</small>
								<h4><?= h($review->title) ?></h4>
								<p>
									<?= h($review->content) ?>
								</p>
								<div class="rating">

									<?php 
									for ($i = 1; $i <= 5; $i++)
									{
										if ($i <= $review->rating)
										{
											echo "<i class=\"icon-smile voted\"></i>";
										}
										else
										{
											echo "<i class=\"icon-smile\"></i>";
										}
									} 
									?>

								</div>
							</div>
							<?php endforeach; ?>
        					<?php endif; ?>
							<!-- End review strip -->

							
						</div>		
					</div>
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-md-4">
					<p class="hidden-sm hidden-xs">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Replier la carte" data-text-original="View on map">Voir sur la carte</a>
					</p>

					<!--<div class="box_style_1 expose">
						<h3 class="inner">- Booking -</h3>
						<a class="btn_full_outline"
						href="">
							<i class=" icon-heart"></i> Add to whislist</a>
					</div>-->
					
					<!--/box_style_1 -->

					<div class="box_style_4">
						<i class="icon_set_1_icon-83"></i>
						<h4><span>Horaires</span></h4>
						<?= $spot->schedule ?>
					</div>

					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Contact</span></h4>
						<strong><?= $spot->contact ?></strong>
					</div>
		
					<div class="box_style_4">
						<i class="icon_set_1_icon-63"></i>
						<h4><span>Site web</span></h4>
						<strong><a href="#"><?= $spot->website ?></a></strong>
					</div>
				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
		
	<div id="overlay"></div>
	<!-- Mask on input focus -->
		
	</main>
	<!-- End main -->

	</main>
    <!-- End main -->