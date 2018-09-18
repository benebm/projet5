        <div class="container margin_60">
            <div class="main_title">
                <h2>Nos <span>Green</span> Tops du moment</h2>
                <p>Nos meilleures adresses éco-friendly, bio ou zéro déchet à Marseille.</p>
            </div>

            <div class="row">

                <?php foreach ($spots as $spot): ?>

                <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="tour_container">

                        <div class="<?= $spot->banner_type ?>"><span><?= $spot->banner ?></span></div>
                        <!--<div class="ribbon_3"><span>Top rated</span></div>-->

                        <div class="img_container">
                            <a href="#">

                                <?php echo $this->Html->image($spot->image, ['alt' => 'Image'], ['class' => 'img-responsive']); ?>
                                <!--<img src="img/tour_box_1.jpg" class="img-responsive" alt="Image">-->

                                <div class="<?= $spot->badge_type ?>"><?= $spot->badge ?></div>

                                <div class="short_info">
                                    <i class="<?= $spot->category->icon ?>"></i><?= $spot->category->title ?><span class="price"><?= $spot->area ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong><?php echo $this->Html->link($spot->name, ['action' => 'view', $spot->slug]) ?></strong></h3>
                            <div class="rating">
                                <?= $spot->slug ?>

                                <?= $rating->moyenne ?> 
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>
                <?php endforeach; ?>
                <!-- End col-md-4 -->

            </div>
            <!-- End row -->
            <p class="text-center nopadding">
                <a href="#" class="btn_1 medium"><i class="icon-eye-7"></i>Voir tous les spots (<?= $totalnumber ?>) </a>
            </p>
        </div>
