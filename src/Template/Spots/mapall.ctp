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
		<?php foreach ($categories as $category): ?>
			<li class="cat" data-index="<?= $category->id ?>"><?= $this->Html->link('<i class="' . $category->icon . '"></i>' . $category->title,
													['action' => 'mapall', $category->id],
													['escape' => false]); ?></li>

		<?php endforeach; ?>
	</ul>
</div>