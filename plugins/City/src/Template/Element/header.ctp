<!-- Header================================================== -->
    <header>
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong>0045 043204434</strong></div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <ul id="top_links">
                            <li>
                                <div class="dropdown dropdown-access">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">Sign in</a>
                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a href="#" class="bt_facebook">
                                                    <i class="icon-facebook"></i>Facebook </a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a href="#" class="bt_paypal">
                                                    <i class="icon-paypal"></i>Paypal </a>
                                            </div>
                                        </div>
                                        <div class="login-or">
                                            <hr class="hr-or">
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputUsernameEmail" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                        </div>
                                        <a id="forgot_pw" href="#">Forgot password?</a>
                                        <input type="submit" name="Sign_in" value="Sign in" id="Sign_in" class="button_drop">
                                        <input type="submit" name="Sign_up" value="Sign up" id="Sign_up" class="button_drop outline">
                                    </div>
                                </div><!-- End Dropdown access -->
                            </li>
                            <li><a href="wishlist.html" id="wishlist_link">Wishlist</a></li>
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
        
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                        <h1><a href="index.html" title="City tours travel template">City Tours travel template</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <?php echo $this->Html->image("logo_sticky.png", [
                            "alt" => "City tours", "data-retina" => "true"]); ?>
                            <!--<img src="img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">-->
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Accueil<i class="icon-down-open-mini"></i></a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Visites <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="all_tours_list.html">All tours list</a></li>
                                    <li><a href="all_tours_grid.html">All tours grid</a></li>
                                    <li><a href="all_tours_map_listing.html">All tours map listing</a></li>
                                    <li><a href="single_tour.html">Single tour page</a></li>
                                    <li><a href="single_tour_with_gallery.html">Single tour with gallery</a></li>
                                    <li><a href="javascript:void(0);">Single tour fixed sidebar</a>
                                        <ul>
                                            <li><a href="single_tour_fixed_sidebar.html">Single tour fixed sidebar</a></li>
                                            <li><a href="single_tour_with_gallery_fixed_sidebar.html">Single tour 2 Fixed Sidebar</a></li>
                                            <li><a href="cart_fixed_sidebar.html">Cart Fixed Sidebar</a></li>
                                            <li><a href="payment_fixed_sidebar.html">Payment Fixed Sidebar</a></li>
                                            <li><a href="confirmation_fixed_sidebar.html">Confirmation Fixed Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="single_tour_working_booking.php">Single tour working booking</a></li>
                                    <li><a href="single_tour_datepicker_v2.html">Date and time picker V2</a></li>
                                    <li><a href="cart.html">Single tour cart</a></li>
                                    <li><a href="payment.html">Single tour booking</a></li>
                                </ul>
                            </li>
                             <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">A propos <i class="icon-down-open-mini"></i></a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">FAQ <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="all_transfer_list.html">All transfers list</a></li>
                                    <li><a href="all_transfer_grid.html">All transfers grid</a></li>
                                    <li><a href="single_transfer.html">Single transfer page</a></li>
                                    <li><a href="single_transfer_datepicker_v2.html">Date and time picker V2</a></li>
                                    <li><a href="cart_transfer.html">Cart transfers</a></li>
                                    <li><a href="payment_transfer.html">Booking transfers</a></li>
                                    <li><a href="confirmation_transfer.html">Confirmation transfers</a></li>
                                </ul>
                            </li>
                              <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Contactez-nous <i class="icon-down-open-mini"></i></a>
                            </li>
                        </ul>
                    </div><!-- End main-menu -->
                    <ul id="top_tools">
                        <li>
                            <div class="dropdown dropdown-search">
                                <a href="#" class="search-overlay-menu-btn" data-toggle="dropdown"><i class="icon-search"></i></a>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-basket-1"></i>Cart (0) </a>
                                <ul class="dropdown-menu" id="cart_items">
                                    <li>
                                        <div class="image">
                                             <?php echo $this->Html->image("thumb_cart_1.jpg", [
                                            "alt" => "image"]); ?>
                                            <!--<img src="img/thumb_cart_1.jpg" alt="image">-->
                                        </div>
                                        <strong>
                                        <a href="#">Louvre museum</a>1x $36.00 </strong>
                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                    </li>
                                    <li>
                                        <div class="image">
                                             <?php echo $this->Html->image("thumb_cart_2.jpg", [
                                            "alt" => "image"]); ?>
                                            <!--<img src="img/thumb_cart_2.jpg" alt="image">-->
                                        </div>
                                        <strong>
                                        <a href="#">Versailles tour</a>2x $36.00 </strong>
                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                    </li>
                                    <li>
                                        <div class="image">
                                             <?php echo $this->Html->image("thumb_cart_3.jpg", [
                                            "alt" => "image"]); ?>
                                            <!--<img src="img/thumb_cart_3.jpg" alt="image">-->
                                        </div>
                                        <strong>
                                        <a href="#">Versailles tour</a>1x $36.00 </strong>
                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                    </li>
                                    <li>
                                        <div>Total: <span>$120.00</span></div>
                                        <a href="cart.html" class="button_drop">Go to cart</a>
                                        <a href="payment.html" class="button_drop outline">Check out</a>
                                    </li>
                                </ul>
                            </div><!-- End dropdown-cart-->
                        </li>
                    </ul>
                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->
    
    