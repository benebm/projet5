<?= $this->element('hero/allhero') ?>

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
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map">			
				<?php
				$geojson = array(
					'type' => 'FeatureCollection', 
					'features' => array()
				);
				foreach ($spots as $spot) {
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
				}

				$spot_json = json_encode($geojson); ?>

			<script>
			var spot_json = <?php echo ($spot_json); ?>;
			</script>
			</div>
		</div>
		<!-- End Map -->


		<div class="container margin_60">

			<div class="row">
				<aside class="col-lg-3 col-md-3">
					<p>
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Replier la carte" data-text-original="Voir sur la carte">Voir sur la carte</a>
					</p>

					<div class="box_style_cat">
						<ul id="cat_nav">			
							<li>
							<?= $this->Html->link('<i class="icon_set_1_icon-51"></i>Tous les spots <span>(' . $totalnumber . ')</span>',
    							['action' => 'all'],
    							['escape' => false, 'id' => 'active']
							)?>
							</li>
							<?php foreach ($categories as $category): ?>
							<li>
                            <?= $this->Html->link('<i class="' . $category->icon . '"></i>' . $category->title . ' <span>(' . count($category->spots) . ')</span>',
    							['action' => 'sort', $category->id],
    							['escape' => false]
							)?>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div id="filters_col">
						<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filtrer par <i class="icon-plus-1 pull-right"></i></a>
						<div class="collapse" id="collapseFilters">
							<div class="filter_type">
								<h6>Note</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox"><span class="rating">1
						<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
						</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">2
						<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
						</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">3
						<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
						</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">4
						<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
						</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">5
						<i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
						</span>
										</label>
									</li>
								</ul>
							</div>
							<div class="filter_type">
								<h6>Quartier</h6>
								<ul><?php foreach ($spots as $spot): ?>
									<li>
										<label>
											<input type="checkbox"><?= $spot->area ?>
										</label>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<!--End collapse -->
					</div>
					<!--End filters col-->
					<div class="box_style_2">
						<i class="icon_set_1_icon-57"></i>
						<h4>Une question ?</h4>
						<a href="tel://004542344599" class="phone">Contactez-nous</a>
					</div>
				</aside>
				<!--End aside -->
				<div class="col-lg-9 col-md-9">

					<?php foreach ($spots as $spot): ?>
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
						
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="<?= $spot->banner_type ?>"><span><?= $spot->banner ?></span>
								</div>
								<!--<div class="wishlist">
									<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
								</div>-->
								<div class="img_list">
									<a href="single_tour.html"><?php echo $this->Html->image($spot->image, ['alt' => 'Image'], ['class' => 'img-responsive']); ?>
										<div class="<?= $spot->badge_type ?>"><?= $spot->badge ?></div>
										<div class="short_info"><i class="<?= $spot->category->icon ?>"></i><?= $spot->category->title ?> </div>
									</a>
								</div>
							</div>
							<div class="clearfix visible-xs-block"></div>

							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<div class="rating">
										<?php foreach ($avgratings as $avgrating): 
                                 		if ($avgrating->spot_slug === $spot->slug)
                                		{
                                    		for ($i = 1; $i <= 5; $i++)
                                    		{
                                        		if ($i <= $avgrating->moyenne)
                                        		{
                                            		echo "<i class=\"icon-smile voted\"></i>";
                                        		}
                                        		else
                                        		{
                                            	echo "<i class=\"icon-smile\"></i>";
                                        		}
                                    		} 
                                		}
                                		endforeach; ?>
                                		<small>(<?= count($spot->reviews) ?>)</small>
									</div>
									<h3><strong><?php echo $this->Html->link($spot->name, ['action' => 'view', $spot->slug]) ?></strong></h3>
									<p><?= $spot->short_description ?></p>
									<ul class="add_info">
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
												<div class="tooltip-content">
													<h4>Horaires</h4>
													<?= $spot->schedule ?>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
												<div class="tooltip-content">
													<h4>Adresse</h4> <?= $spot->address ?>
													<br>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-90"></i></span>
												<div class="tooltip-content">
													<h4>Contact</h4> <?= $spot->contact ?>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-63"></i></span>
												<div class="tooltip-content">
													<h4>Site web</h4> <?= $spot->website ?>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-25"></i></span>
												<div class="tooltip-content">
													<h4>Transports en commun</h4> <?= $spot->transport ?>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="price_list">
									<div><span class="normal_price_list">Quartier<br/> <?= $spot->area ?></span><br />
										<p><a href="single_tour.html" class="btn_1">Détails</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!--End strip -->
					<?php endforeach; ?>

					<hr>

					<div class="text-center">
						<ul class="pagination">
							<li><?= $this->Paginator->prev(__('Page précédente')) ?>
							</li>
							<li><?= $this->Paginator->numbers() ?>
							</li>
							<li><?= $this->Paginator->next(__('Page suivante')) ?>
						</ul>
					</div>
				</div>
				<!-- End col lg-9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->