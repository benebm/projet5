<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>CITY TOURS - City tours and travel site template by Ansonika</title>
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

    <!-- CSS -->
    <!--<link href="css/base.css" rel="stylesheet">-->
    <!--<link href="css/date_time_picker.css" rel="stylesheet">-->
    <?php echo $this->Html->css('base.css'); ?>
    <?php echo $this->Html->css('date_time_picker.css'); ?>

     <?php echo $this->fetch('css'); ?>
        
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
        
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->
     <?= $this->element('header') ?>

    <main>

    	<?= $this->fetch('content') ?>
    	
    </main>
    <!-- End main -->
    
     <?= $this->element('footer') ?>
    
    <div id="toTop"></div><!-- Back to top button -->
    
    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon_set_1_icon-78"></i>
            </button>
        </form>
    </div><!-- End Search Menu -->

 <!-- Common scripts -->
<!--<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script-->

<?php echo $this->Html->script('jquery-2.2.4.min.js'); ?>
<?php echo $this->Html->script('common_scripts_min.js'); ?>
<?php echo $this->Html->script('functions.js'); ?>

<!-- Specific scripts -->
    <!--<script src="js/icheck.js"></script>-->
    <?php echo $this->Html->script('icheck.js'); ?>
    <?php $this->Html->scriptStart(['block' => true]); ?>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey'
        });
    <?php $this->Html->scriptEnd(); ?>

    <!-- Date and time pickers -->
    <!--<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-timepicker.js"></script>-->
    <?php echo $this->Html->script('bootstrap-datepicker.js'); ?>
    <?php echo $this->Html->script('bootstrap-timepicker.js'); ?>
    <?php $this->Html->scriptStart(['block' => true]); ?>
        $('input.date-pick').datepicker('setDate', 'today');
        $('input.time-pick').timepicker({
            minuteStep: 15,
            showInpunts: false
        })
    <?php $this->Html->scriptEnd(); ?>

    <!--Review modal validation -->
    <!--<script src="validate.js"></script>-->
    <?php echo $this->Html->script('validate.js'); ?>

    <!-- Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAqoTjKLYOr9z45jZ990XYItWB88c6LtZ8"></script>                               
    <!--<script src="js/map.js"></script>
    <script src="js/infobox.js"></script>-->
    <?php echo $this->Html->script('map.js'); ?>
    <?php echo $this->Html->script('infobox.js'); ?>


<?php echo $this->fetch('script'); ?>

  </body>
</html>