<?= $this->Html->docType(); ?>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="fr">
<head>
    <?= $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1'); ?>
    <?= $this->Html->meta('description', 'MARSEILLE GREEN - Le guide des spots bio, écolo & zéro déchet à Marseille'); ?>
    <?= $this->Html->meta('author', 'benebm'); ?>

    <title>MARSEILLE GREEN - Le guide des spots bio, écolo & zéro déchet à Marseille</title>
    
    <!-- Favicons-->
    <?= $this->Html->meta('favicon.ico', 'img/favicon.ico', ['type' => 'icon', 'rel' => 'shortcut icon']); ?>
    <?= $this->Html->meta('apple-touch-icon-57x57-precomposed.png', 'img/apple-touch-icon-57x57-precomposed.png', ['type' => 'icon', 'rel' => 'apple-touch-icon']); ?>
    <?= $this->Html->meta('apple-touch-icon-72x72-precomposed.png', 'img/apple-touch-icon-72x72-precomposed.png', ['type' => 'icon', 'rel' => 'apple-touch-icon', 'sizes' => '72x72']); ?>
    <?= $this->Html->meta('apple-touch-icon-114x114-precomposed.png', 'img/apple-touch-icon-114x114-precomposed.png', ['type' => 'icon', 'rel' => 'apple-touch-icon', 'sizes' => '114x114']); ?>
    <?= $this->Html->meta('apple-touch-icon-144x144-precomposed.png', 'img/apple-touch-icon-144x144-precomposed.png', ['type' => 'icon', 'rel' => 'apple-touch-icon', 'sizes' => '144x144']); ?>

    <!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

    <!-- CSS -->
    <?php echo $this->Html->css('base.css'); ?>

    <!-- mapbox map css implementation-->
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css' rel='stylesheet' />
    
    <?php echo $this->fetch('css'); ?>
        
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <header id="plain">
     <?= $this->element('header') ?>
    </header><!-- End Header -->

    <?= $this->fetch('content') ?>
    
    <!-- Search Menu -->
    <!--<div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon_set_1_icon-78"></i>
            </button>
        </form>
    </div>--><!-- End Search Menu -->

 <!-- Common scripts -->
<?php echo $this->Html->script('jquery-2.2.4.min.js'); ?>
<?php echo $this->Html->script('common_scripts_min.js'); ?>
<?php echo $this->Html->script('functions.js'); ?>

<!--[if lt IE 9]>
      <?php echo $this->Html->script('html5shiv.min.js'); ?>
      <?php echo $this->Html->script('respond.min.js'); ?>
    <![endif]-->

<!-- Specific scripts -->

    <!--Mapbox map-->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js'></script>

    <!-- Map -->
    <?php echo $this->Html->script('fullmap.js'); ?>
    
    <?php echo $this->fetch('script'); ?>

  </body>
</html>