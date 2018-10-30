	<section class="parallax-window" data-parallax="scroll" data-image-src="<?= $this->Url->image($spot->imagecover) ?>" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h1><?= $spot->name ?></h1>
						<span><?= $spot->address ?></span>
						<span class="rating"><?php for ($i = 1; $i <= 5; $i++)
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
							<span>- Quartier : <?= $spot->area ?> -</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End section -->


