<?= $this->element('hero/viewhero') ?>

<main>
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a>
				</li>
				<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'all']); ?>">Catégorie</a>
				</li>
				<li>
					<?= $spot->category->homename ?>
				</li>
			</ul>
		</div>
	</div>
	<!-- End Position -->

	<div class="collapse" id="collapseMap">
		<div id="map" class="map">
			<?php
			$geojson = array(
				'type' => 'FeatureCollection', 
				'features' => array()
			);
			
			$marker = array(
				'type' => 'Feature',
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array(
						$spot->position_lng,
						$spot->position_lat
					)
				),
				'properties' => array(
					'title' => $spot->name,
					'description' => $spot->short_description,
					'image' => $this->Html->image($spot->imagemap),
					'phone' => $spot->contact,
					'details' => $this->Html->link(__('Site web'), $spot->website, ['class' => 'btn_infobox', 'target' => '_blank']),
					'category' => $spot->category_id,
				)
			);
			array_push($geojson['features'], $marker);

			$spot_json = json_encode($geojson); ?>

			<script>
				var spot_json = <?php echo ($spot_json); ?>;
			</script>
		</div>
		<div id="directions">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<form action="http://maps.google.com/maps" method="get" target="_blank">
							<div class="input-group">
								<input type="text" name="saddr" placeholder="Entrez votre point de départ" class="form-control style-2" />
								<input type="hidden" name="daddr" value="<?= $spot->position_lat . ',' . $spot->position_lng ?>">
								<span class="input-group-btn">
									<button class="btn" type="submit" value="Itinéraire" style="margin-left:0;">Itinéraire</button>
								</span>
							</div>
							<!-- /input-group -->
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end directions-->
	</div>
	<!-- End Map -->

	<div class="container margin_30">
		<div class="row">
			<div class="col-md-8" id="single_tour_desc">

				<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Replier la carte" data-text-original="View on map">Voir sur la carte</a>
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
							<ul class="list_ok">
								<?= $spot->likelist ?>
							</ul>
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

						<?= $this->Form->create(isset($review), ['url' => ['action' => 'addReview']]); ?>
						<div class="form-group">
							<?= $this->Form->control('title', ['class' => 'form-control', 'placeholder' => 'Votre titre', 'label' => false]) ?>
						</div>
						<?= $this->Form->control('username', ['type' => 'hidden', 'value' => $username]) ?>

						<?= $this->Form->control('spot_id', ['type' => 'hidden', 'value' => $spot->id]) ?>
						<?= $this->Form->control('spot_slug', ['type' => 'hidden', 'value' => $spot->slug]) ?>
						<div class="form-group">
							<?= $this->Form->control('content', ['class' => 'form-control', 'placeholder' => 'Votre commentaire', 'label' => false, 'type' => 'textarea']) ?>
						</div>
						<div class="form-group">
							<?= $this->Form->radio('rating',[
								['class' =>'form-control-radio', 'value' => '1', 'text' => '1 sur 5'],
								['class' =>'form-control-radio', 'value' => '2', 'text' => '2 sur 5'],
								['class' =>'form-control-radio', 'value' => '3', 'text' => '3 sur 5'],
								['class' =>'form-control-radio', 'value' => '4', 'text' => '4 sur 5'],
								['class' =>'form-control-radio', 'value' => '5', 'text' => '5 sur 5'], 
							]
						); ?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Laisser un avis</button>
					</div>
					<?= $this->Form->end(); ?>

					<?php if ($spot->reviews): ?>
						<div id="general_rating"><?= count($spot->reviews) ?> Appréciations
								<div class="rating">
								<?php for ($i = 1; $i <= 5; $i++)
								{
								if ($i <= $rating->moyenne)
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
							<!-- End general_rating -->
							<hr>

							<?php foreach ($spot->reviews as $review): ?>
								<div class="review_strip_single">
									<div id="review_img">
									<?php foreach ($files as $file):
										$path_parts = pathinfo($file);										
										$img_name = $path_parts['filename'];
										$img_ext = $path_parts['extension'];

                							if (('avatar_' . $review->user_id) === $img_name) { 	
											echo $this->Html->image('avatars/' . $img_name . '.' . $img_ext, [
                                    		'alt' => $review->username, 
                                    		'class' => 'img-circle'
                                    		]);
											}
                					endforeach; ?>   
                                	</div>
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
					<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Replier la carte" data-text-original="Voir sur la carte">Voir sur la carte</a>
				</p>

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
					<h4><span style="text-decoration:underline;"><?= $this->Html->link(__('Site web'), $spot->website, ['target' => '_blank']) ?></span></h4>
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
