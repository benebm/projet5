<?= $this->element('hero/allhero') ?>

<main>
	<div id="position">
		<div class="container">
			<ul>
				<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a>
				</li>
				<?php if(!isset($id) && (!isset($district)))
				{
					echo '<li>Tous les spots</li>';
				}
				else if (isset($id) && (!isset($district)))
					{ ?>
						<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'all']); ?>">Catégorie</a>
						</li>
						<li>
							<?= $breadcrumb->homename; ?>
						</li>
					<?php }
					else if (!isset($id) && (isset($district)))
						{ ?>
							<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'all']); ?>">Arrondissement</a>
							</li>
							<li>
								<?= $district; ?>
							</li>
						<?php }
						else if (isset($id) && (isset($district)))
							{ ?>
								<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'all']); ?>">Catégorie</a>
								</li>
								<li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'sortCat', $id]); ?>"><?= $breadcrumb->homename ?></a>
								</li>
								<li><?= $district; ?></li>
							<?php } ?>
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
						foreach ($mapspots as $mapspot) {
							$marker = array(
								'type' => 'Feature',
								'geometry' => array(
									'type' => 'Point',
									'coordinates' => array(
										$mapspot->position_lng,
										$mapspot->position_lat
									)
								),
								'properties' => array(
									'title' => $mapspot->name,
									'description' => $mapspot->short_description,
									'image' => $this->Html->image($mapspot->imagemap),
									'phone' => $mapspot->contact,
									'details' => $this->Html->link(__('Site web'), $mapspot->website, ['class' => 'btn_infobox', 'target' => '_blank']),
									'category' => $mapspot->category_id,
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
									<li>
										<?php foreach ($categories as $category):
											foreach ($spotscounts as $spotscount): 
												if ($spotscount->category_id === $category->id)
												{
													echo $this->Html->link('<i class="' . $category->icon . '"></i>' . $category->title . ' <span>(' . $spotscount->count . ')</span>',
														['action' => 'sortCat', $category->id],
														['escape' => false, 'id' => '']);
												}
											endforeach;
										endforeach; ?>
									</li>
								</ul>
							</div>

							<div id="filters_col">
								<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filtrer par arrondissement <i class="icon-plus-1 pull-right"></i></a>
								<div class="collapse" id="collapseFilters">
									<div class="filter_type">
										<ul><?php foreach ($districts as $district): ?>
											<li>
											<?php if(!isset($id))
											{ ?>
												<i class="icon-ok-1"></i> <?= $this->Html->link($district->district, ['action' => 'sortDis', $district->district]);
											} 
											else
												{ ?>
													<i class="icon-ok-1"></i> <?= $this->Html->link($district->district, ['action' => 'filter', $id, $district->district]);
												} ?>
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
							<a href="<?= $this->Url->build(['controller' => 'Users','action' => 'contact']); ?>" class="phone">Contactez-nous</a>
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
										<div class="img_list">
											<?php echo $this->Html->image($spot->image, [
											'alt' => 'Image',
											'class' => 'img-responsive',
											'url' => ['action' => 'view', $spot->slug]
											]); ?>
											<div class="short_info"><i class="<?= $spot->category->icon ?>"></i><?= $spot->category->title ?> </div>
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
														<h4>Horaires</h4> <?= $spot->schedule ?>
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
											<p><?= $this->Html->link('Détails', ['action' => 'view', $spot->slug], ['class' => 'btn_1']) ?>
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