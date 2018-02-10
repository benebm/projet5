<section class="parallax-window" data-parallax="scroll" data-image-src="" data-natural-width="1400" data-natural-height="470">
	<?php echo $this->Html->image("single_tour_bg_1.jpg", ["class" => "parallax-window"]); ?>
			<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h1><?= $tour->name ?></h1>
						<span><?= $tour->address ?></span>
						<span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small></span>
					</div>
					<div class="col-md-4 col-sm-4">
						<div id="price_single_main">
							from/per person <span><?= $tour->price ?><sup>€</sup></span>
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
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>
						<?= $tour->category->title ?>
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
								<?= $tour->description ?>
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
						<div class="col-md-9"><?php if ($tour->reviews): ?>
							<div id="general_rating"><?= count($tour->reviews) ?> Appréciations
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<!-- End general_rating -->
							<hr>
							<?php foreach ($tour->reviews as $review): ?>
							<div class="review_strip_single">
								<!--<img src="img/avatar1.jpg" class="img-circle">-->
								<?php echo $this->Html->image("avatar1.jpg", ["class" => "img-circle"]); ?>
								<small> - <?= $review->created->format('F jS Y, H:i') ?> -</small>
								<h4><?= $review->username ?></h4>
								<p>
									<?= $review->content ?>
								</p>
								<div class="rating"><?= $review->rating ?>
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<?php endforeach; ?>
        					<?php endif; ?>
							<!-- End review strip -->

							<?= $this->Form->create($review); ?>
                				<div class="form-group">
                    				<?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Your username', 'label' => false]) ?>
                				</div>
            					<?= $this->Form->control('tour_id', ['type' => 'hidden', 'value' => $tour->id]) ?>
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
								<div class="form-group">
									<label><i class="icon-calendar-7"></i> Select a date</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label><i class=" icon-clock"></i> Time</label>
									<input class="time-pick form-control" value="12:00 AM" type="text">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Adults</label>
									<div class="numbers-row">
										<input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Children</label>
									<div class="numbers-row">
										<input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
									</div>
								</div>
							</div>
						</div>
						<br>
						<table class="table table_summary">
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
										3x <?= $tour->price ?>
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
						</table>
						<a class="btn_full" href="cart.html">Book now</a>
						<a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to whislist</a>
					</div>
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