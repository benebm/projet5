
<div class="white_bg">
            <div class="container margin_60">

                <div class="main_title">
                    <h2>Les types de spot sélectionnés par <span>Green</span></h2>
                    <p>
                        Marseille Green vous aide à trouver tous les services de la vie quotidienne, mais en version bio/écolo.
                    </p>
                </div>

                <div class="row">
                    <?php foreach ($categories as $category): ?><!-- ajouter spotscounts dans les categories -->
                    <div class="col-md-3 col-sm-6 text-center">
                        <p>      
                            <?= $this->Html->link(
                                    $this->Html->image($category->image, ["alt" => "<?= $category->title ?>", "class" => "img-responsive"]),
                                ['action' => 'sort', $category->id],
                                ['escape' => false]
                            )?>
                        </p>
                        <h4><?= $this->Html->link($category->homename, ["class" => "homelink"], ['action' => 'sort', $category->id]) ?></h4>
                        <p>
                            <?= $category->description ?>
                        </p>
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
                        Les clichés sur la ville de Marseille ont vécu... Marseille au quotidien, c'est aussi des citoyens qui ont envie de faire avancer leur ville vers plus de respect de l'environnement.
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
                <p>
                    Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                </p>
            </div>

            <div class="row">

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-41"></i>
                        <h3>Des citoyens <span>engagés</span></h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="about.html" class="btn_1 outline">Read more</a>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-30"></i>
                        <h3><span>+1000</span> Customers</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="about.html" class="btn_1 outline">Read more</a>
                    </div>
                </div>

                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-57"></i>
                        <h3><span>H24 </span> Support</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="about.html" class="btn_1 outline">Read more</a>
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
                    <p>Pour garantir une expérience de qualité chez nos partenaires et agrandir notre réseau en proposant les meilleurs plans écolo de Marseille, nous avons besoin de vous !</p>
                    <ul class="list_order">
                        <li><span>1</span>Trouvez les lieux qui vous intéressent dans notre liste de spots 100% nature</li>
                        <li><span>2</span>Testez-les !</li>
                        <li><span>3</span>Donnez votre avis et notez votre expérience pour</li>
                    </ul>
                    <a href="all_tour_list.html" class="btn_1">C'est parti</a>
                </div>
            </div>
            <!-- End row -->

        </div>