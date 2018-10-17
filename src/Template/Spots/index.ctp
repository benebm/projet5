        <div class="container margin_60">
            <div class="main_title" id="nostops">
                <h2>Nos <span>Green</span> Tops du moment</h2>
                <p>Nos meilleures adresses éco-friendly, bio ou zéro déchet à Marseille.</p>
            </div>

            <div class="row">
                <?php foreach ($spots as $spot): ?>
                <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="tour_container">

                        <div class="<?= $spot->banner_type ?>"><span><?= $spot->banner ?></span></div>

                        <div class="img_container">
                            <a href="#">

                                <?php echo $this->Html->image($spot->image, ['alt' => 'Image', 'class' => 'img-responsive']); ?>
                                <div class="short_info">
                                    <i class="<?= $spot->category->icon ?>"></i><?= $spot->category->title ?><span class="price"><?= $spot->area ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong><?php echo $this->Html->link($spot->name, ['action' => 'view', $spot->slug]) ?></strong></h3>
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
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>   
                <!-- End col-md-4 -->
                <?php endforeach; ?>
            </div>
            <!-- End row -->
            <p class="text-center nopadding">
                <a href="#" class="btn_1 medium"><i class="icon-eye-7"></i>Voir tous les spots (<?= $totalnumber ?>) </a>
            </p>
        </div>