<div class="white_bg">
    <div class="container margin_60">
        <div class="main_title">
            <h2>Les types de spot sélectionnés par <span>Green</span></h2>
            <p>
                Marseille Green vous aide à trouver tous les services de la vie quotidienne, version bio/écolo.
            </p>
        </div>

        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-md-3 col-sm-6 text-center">
                    <p>      
                        <?php echo $this->Html->image($category->image, [
                            'alt' => $category->title,
                            'class' => 'img-responsive',
                            'url' => ['action' => 'sortCat', $category->id]
                        ]); ?>
                    </p>         
                    <?php foreach ($spotscounts as $spotscount): 
                        if ($spotscount->category_id === $category->id)
                            { ?>
                                <h4>
                                    <?= $this->Html->link($category->homename . ' <small>(' . $spotscount->count . ')</small>', 
                                        ['action' => 'sortCat', $category->id],
                                        ['escape' => false]); ?>
                                    </h4>
                                <?php }   
                            endforeach; ?>    
                    <p><?= $category->description ?></p> 
                </div>
            <?php endforeach; ?>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</div>
<!-- End white_bg -->

<section class="promo_full">
    <div class="promo_full_wp magnific">
        <div>
            <h3>Vivre Marseille, autrement</h3>
            <p>
                Les clichés sur la ville de Marseille ont vécu... Marseille aujourd'hui, ce sont aussi des citoyens qui ont envie de faire avancer leur ville. <br />La preuve en images !
            </p>
            <?= $this->Html->link(__('<i class="icon-play-circled2-1"></i>'), 
                "https://www.youtube.com/watch?v=TBDYl-NiixM", 
                ['escape' => false],
                ['class' => 'video', 'target' => '_blank']) ?>       
        </div>
    </div>
</section>
<!-- End section -->

<div class="container margin_60">
    <div class="main_title">
        <h2>Le concept <span>Green</span></h2>
        <p>Libérez votre nature : votre quotidien à Marseille, mais en plus vert.</p>
    </div>
    <div class="row">
        <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
            <div class="feature_home">
                <i class="icon_set_1_icon-49"></i>
                <h3>Plus de <span>100 spots...</span></h3>
                <p>Etre plus écolo au quotidien, vous aimeriez bien, mais vous ne savez pas comment faire ? Ca tombe bien, on vous a mâché le travail !</p>
                <?= $this->Html->link('En savoir plus', ['controller' => 'Pages', 'action' => 'concept'], ['class' => 'btn_1 outline']) ?>
            </div>
        </div>

        <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
            <div class="feature_home">
                <i class="icon_set_1_icon-78"></i>
                <h3>... répartis en <span>8 catégories</span></h3>
                <p>Nos spots sont classés en fonction de vos besoins de consommation de tous les jours : tous vos achats les plus courants sont couverts !</p>
                <?= $this->Html->link('En savoir plus', ['controller' => 'Pages', 'action' => 'concept'], ['class' => 'btn_1 outline']) ?>
            </div>
        </div>

        <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
            <div class="feature_home">
                <i class="icon_set_1_icon-41"></i>
                <h3><span>Géolocalisés</span> sur notre carte</h3>
                <p>En un coup d'oeil, vous visualisez la liste complète de nos spots, pour trouver rapidement tous les commerces proches de chez vous.</p>
                <?= $this->Html->link('En savoir plus', ['controller' => 'Pages', 'action' => 'concept'], ['class' => 'btn_1 outline']) ?>
            </div>
        </div>
    </div>
    <!--End row -->
    <hr>

    <div class="row">
        <div class="col-md-6 col-sm-6 hidden-xs">
            <img src="<?= $this->Url->image('laptop.png') ?>" alt="Laptop" class="img-responsive laptop">
        </div>
        <div class="col-md-6 col-sm-6">
            <h3>Participer à la communauté <span>Marseille Green</span></h3>
            <p>Pour garantir une expérience de qualité chez nos partenaires et agrandir notre réseau en proposant <strong>les meilleurs plans écolo de Marseille</strong>, nous avons besoin de vous !</p>
            <ul class="list_order">
                <li><span>1</span>Choisissez vos commerces préférés dans notre liste 100% nature</li>
                <li><span>2</span>Testez !</li>
                <li><span>3</span>Donnez votre avis et notez votre expérience</li>
            </ul>
            <?= $this->Html->link('C\'est parti', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn_1']) ?>
        </div>
    </div>
    <!-- End row -->
</div>