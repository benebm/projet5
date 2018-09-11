<section class="parallax-window" data-parallax="scroll" data-image-src="" data-natural-width="1400" data-natural-height="470">
	<?php echo $this->Html->image($spot->image, ['alt' => 'Image'], ['class' => 'parallax-window']); ?>
			<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h1><?= $spot->name ?></h1>
						<span><?= $spot->address ?></span>
						<span class="rating">
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
							<small>(<?= count($spot->reviews) ?>)</small>
						</span>
					</div>
					<div class="col-md-4 col-sm-4">
						<div id="price_single_main">
							from/per person <span><?= $spot->slug ?><sup>€</sup></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Accueil</a>
					</li>
					<li><a href="#">Category</a>
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
		</div>
		<!-- End Map -->

<div class="container margin_60">
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">

					<div id="single_tour_feat">
						<ul>
							<li><i class="icon_set_1_icon-4"></i>Museum</li>
							<li><i class="icon_set_1_icon-83"></i>3 Hours</li>
							<li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
							<li><i class="icon_set_1_icon-82"></i>144 Likes</li>
							<li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
							<li><i class="icon_set_1_icon-97"></i>Audio guide</li>
							<li><i class="icon_set_1_icon-29"></i>Tour guide</li>
						</ul>
					</div>

					<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<!-- Map button for tablets/mobiles -->

					<div class="row">
						<div class="col-md-3">
							<h3>Description</h3>
						</div>
						<div class="col-md-9">
							<h4>Category</h4>
							<p>
								<?= $spot->description ?>
							</p>
							<h4>What's include</h4>
							<p>
								Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
							</p>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>Ut est saepe munere ceteros</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
									</ul>
								</div>
								<div class="col-md-6 col-sm-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>No scripta electram necessitatibus sit</li>
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

						
							<?= $this->Form->create($review, ['url' => ['action' => 'addReview']]); ?>
                				<div class="form-group">
                    				<?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Your username', 'label' => false]) ?>
                				</div>
            					<?= $this->Form->control('spot_id', ['type' => 'hidden', 'value' => $spot->id]) ?>
            					<?= $this->Form->control('spot_slug', ['type' => 'hidden', 'value' => $spot->slug]) ?>
        						<div class="form-group">
            						<?= $this->Form->control('content', ['class' => 'form-control', 'placeholder' => 'Your review', 'label' => false]) ?>
        						</div>
        						<div class="form-group">
            						<?= $this->Form->control('rating', ['class' => 'form-control', 'placeholder' => 'votre note', 'label' => false]) ?>
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
								<small> - <?= $review->created->format('F jS Y, H:i') ?> -</small>
								<h4><?= h($review->username) ?></h4>
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
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<div class="box_style_1 expose">
						<h3 class="inner">- Booking -</h3>
						<div class="row">
							<div class="col-md-6 col-sm-6">

        						<?= $this->Form->create($order, ['url' => ['action' => 'addOrder', $spot->slug]]); ?>
								<div class="form-group">
									<i class="icon-calendar-7"></i> <strong>Date</strong>
									<?= $this->Form->control('day', ['class' => 'date-pick form-control', 'label' => false, 'data-date-format' => 'M d, D', 'type' => 'text']) ?>
								</div>
							</div>
							<?= $this->Form->control('spot_id', ['type' => 'hidden', 'value' => $spot->id]) ?>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<i class=" icon-clock"></i> <strong>Heure de début</strong>
									<?= $this->Form->control('time', ['class' => 'time-pick form-control', 'value' => '12:00 AM', 'label' => false, 'type' => 'text']) ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
										<strong>Participants</strong>
										<div class="numbers-row">
										<?= $this->Form->control('guests', ['class' => 'qty2 form-control', 'value' => '1', 'type' => 'text', 'id' => 'adults', 'name' => 'quantity', 'label' => false, 'name' => 'guests']) ?>
										</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
										<strong>Durée</strong>
										<div class="numbers-row">
									<?= $this->Form->control('duration', ['class' => 'qty2 form-control', 'placeholder' => false, 'label' => false, 'type' => 'text', 'value' => '2h', 'id' => 'children', 'name' => 'duration']) ?>
									</div>
								</div>
							</div>
						</div>
						<br>
						<!--<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										Adults
									</td>
									<td class="text-right">
										2
									</td>
								</tr>
								<tr>
									<td>
										Children
									</td>
									<td class="text-right">
										0
									</td>
								</tr>
								<tr>
									<td>
										Total amount
									</td>
									<td class="text-right">
										3x <?= $spot->slug ?>
									</td>
								</tr>
								<tr class="total">
									<td>
										Total cost
									</td>
									<td class="text-right">
										$154
									</td>
								</tr>
							</tbody>
						</table>-->
						<button type="submit" class="btn_full">Réserver maintenant</button>
						<!--<a class="btn_full" href="cart.html">Book now</a>--> 
						<a class="btn_full_outline"
						href="">

							<i class=" icon-heart"></i> Add to whislist</a>
					</div>
					<?= $this->Form->end(); ?>
					<!--/box_style_1 -->

					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Book</span> by phone</h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
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