


<div id="map" class="map" style="border-bottom:none; height:100%; width:100%; position:absolute; top:0; left:0;">
		


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


 <div id="map_filter">
 <ul>
<li><a href="javascript:toggleMarkers('Historic');"><i class="icon_set_1_icon-44"></i><span>Historic Buildings</span></a></li>
<li><a href="javascript:toggleMarkers('Sightseeing');"><i class="icon_set_1_icon-3"></i><span>City sightseeing</span></a></li>
<li><a href="javascript:toggleMarkers('Museums');"><i class="icon_set_1_icon-4"></i><span>Museum</span></a></li>
<li><a href="javascript:toggleMarkers('Skyline');"><i class="icon_set_1_icon-28"></i><span>Skyline tours</span></a></li>
<li><a href="javascript:toggleMarkers('Eat_drink');"><i class="icon_set_1_icon-14"></i><span>Eat & Drink</span></a></li>
<li><a href="javascript:toggleMarkers('Walking');"><i class="icon_set_1_icon-37"></i><span>Walking tours</span></a></li>
<li><a href="javascript:toggleMarkers('Churches');"><i class="icon_set_1_icon-43"></i><span>Churces</span></a></li>
</ul>
</div>