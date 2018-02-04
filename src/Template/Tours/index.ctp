        <div class="container margin_60">
            <div class="main_title">
                <h2>Les visites <span>incontournables</span></h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>

            <div class="row">

                <?php foreach ($tours as $tour): ?>
                <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span><?= $tour->banner ?></span></div>
                        <!--<div class="ribbon_3"><span>Top rated</span></div>-->
                        <div class="img_container">
                            <a href="single_tour.html">

                                <?php echo $this->Html->image($tour->image, ['alt' => 'Image'], ['class' => 'img-responsive']); ?>
                                <!--<img src="img/tour_box_1.jpg" class="img-responsive" alt="Image">-->
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i><?= $tour->category ?><span class="price"><sup>€</sup><?= $tour->price ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong><?php echo $this->Html->link($tour->name, ['action' => 'view', $tour->slug]) ?></strong></h3>
                            <div class="rating">
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
                <a href="#" class="btn_1 medium"><i class="icon-eye-7"></i>View all tours (144) </a>
            </p>
        </div>
