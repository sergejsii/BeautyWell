<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\ThemeAsset;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\UserAddress;

/* @var $this \yii\web\View */
/* @var $content string */

//AppAsset::register($this);
ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?php $this->head() ?>

    <!-- Stylesheets -->
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,800%7COpen+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
    <!--[if IE 9]>
    <script src="js/media.match.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>

<div id="main-wrapper">
    <header id="header">
        <div class="header-top-bar">
            <div class="container">
                <!-- HEADER-LOGIN -->
                <div class="header-login">
                   <?php if (Yii::$app->user->isGuest): ?>
                    <a href="<?= \yii\helpers\Url::to(['/user/security/login']) ?>" class=""><i class="fa fa-power-off"></i>Login</a>
                   <?php else: ?>
                       <a href="<?= \yii\helpers\Url::to(['/profile']) ?>" class=""><i class="fa  fa-user"></i> <?=  \Yii::$app->user->identity->username ?>   </a>
                       <a href="<?= \yii\helpers\Url::to(['/user/security/logout']) ?>" class=""><i class="fa fa-power-off"></i> Logout</a>

                   <?php endif ?>

                </div> <!-- END .HEADER-LOGIN -->

                <!-- HEADER REGISTER -->
            <?php if (Yii::$app->user->isGuest): ?>
                <div class="header-register">
                    <a href="<?= \yii\helpers\Url::to(['/user/registration/register']) ?>" class=""><i class="fa fa-plus-square"></i> Register</a>

                    <div>
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Username">
                            <input type="email" class="form-control" placeholder="Email">
                            <input type="password" class="form-control" placeholder="Password">
                            <input type="submit" class="btn btn-default" value="Register">
                        </form>
                    </div>

                </div> <!-- END .HEADER-REGISTER -->
            <?php endif ?>
                <!-- HEADER-LOG0 -->
                <div class="header-logo text-center">
                    <h2><a href="index-2.html">GL<i class="fa fa-globe"></i>BO</a></h2>
                </div>
                <!-- END HEADER LOGO -->

                <!-- HEADER-SOCIAL -->
                <div class="header-social">
                    <a href="#">
                        <span><i class="fa fa-share-alt"></i></span>
                        <i class="fa fa-chevron-down social-arrow"></i>
                    </a>

                    <ul class="list-inline">
                        <li class="active"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    </ul>
                </div>
                <!-- END HEADER-SOCIAL -->

                <!-- HEADER-LANGUAGE -->
                <div class="header-language">
                    <a href="#">
                        <span>EN</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>

                    <ul class="list-unstyled">
                        <li class="active"><a href="#">EN</a></li>
                        <li><a href="#">FR</a></li>
                        <li><a href="#">PT</a></li>
                        <li><a href="#">IT</a></li>
                    </ul>
                </div> <!-- END HEADER-LANGUAGE -->

                <!-- CALL TO ACTION -->
                <div class="header-call-to-action">
                    <a href="#" class="btn btn-default"><i class="fa fa-plus"></i> Add Listing</a>
                </div><!-- END .HEADER-CALL-TO-ACTION -->

            </div><!-- END .CONTAINER -->
        </div>
        <!-- END .HEADER-TOP-BAR -->

        <!-- HEADER SEARCH SECTION -->
        <div class="header-search slider-home">
            <div class="header-search-bar">
                <form action="<?= Url::to(['/search'])?>" method="get">
                    <div class="search-toggle">
                        <div class="container">
                            <div class="distance-range">
                                <p>
                                    <label for="amount-search">Distance:</label>
                                    <input type="text" id="amount-search">
                                </p>

                                <div id="slider-range-search"></div>
                            </div>  <!-- end #distance-range -->

                            <div class="distance-range">
                                <p>
                                    <label for="amount-search">Days published:</label>
                                    <input type="text" id="amount-search-day">
                                </p>

                                <div id="slider-range-search-day"></div>
                            </div>  <!-- end #distance-range -->

                            <p>Location:</p>
                            <div class="select-country">
                                <select class="" data-placeholder="-Select Country-">
                                    <option value="option1">option 1</option>
                                    <option value="option2">option 2</option>
                                    <option value="option3">option 3</option>
                                </select>
                            </div>

                            <div class="region">
                                <input type="text" placeholder="-Region-">
                            </div>

                            <div class="address">
                                <input type="text" placeholder="-Address-">
                            </div>

                            <div class="category-search">
                                <select class="" data-placeholder="-Select category-">
                                    <option value="option1">option 1</option>
                                    <option value="option2">option 2</option>
                                    <option value="option3">option 3</option>
                                </select>
                            </div>

                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>

                        </div>
                    </div>  <!-- END .search-toggle -->
                    <div class="container">
                        <button class="toggle-btn" type="submit"><i class="fa fa-bars"></i></button>

                        <div class="search-value ">
                            <div class="keywords">
                                   <input type="text" class="form-control" name="q"  placeholder="Keywords">
                            </div>

                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div> <!-- END .CONTAINER -->

            </div> <!-- END .header-search-bar -->
            </form>
        </div> <!-- END .SEARCH and slide-section -->

        <div class="container">
            <div class="header-nav-bar home-slide">
                <nav>

                    <button><i class="fa fa-bars"></i></button>

                    <ul class="primary-nav list-unstyled">
                        <li class="bg-color"><a href="#">Home<i class="fa fa-angle-down"></i></a>
                            <ul>
                                <li><a href="home-map-grid.html">Home-map(grid)</a></li>
                                <li><a href="home-map-list.html">Home-map(list)</a></li>
                                <li><a href="index-2.html">Home slider(view-1)</a></li>
                                <li><a href="home-category.html">Home slider(view-2)</a></li>
                            </ul>

                        </li>

                        <li class=""><a href="#">Company<i class="fa fa-angle-down"></i></a>

                            <ul>
                                <li><a href="company-profile.html">Company(Profile)</a></li>
                                <li><a href="company-product.html">Company(Product)</a></li>
                                <li><a href="company-portfolio.html">Company(Portfolio)</a></li>
                                <li><a href="company-events.html">Company(Events)</a></li>
                                <li><a href="company-blog.html">Company(Blog)</a></li>
                                <li><a href="company-contact.html">Company(contact)</a></li>
                            </ul>

                        </li>

                        <li><a href="sample-page.html">Sample Page</a></li>
                        <li><a href="shortcodes.html">Shortcodes</a></li>

                        <li class="">
                            <a href="#">Blog<i class="fa fa-angle-down"></i></a>

                            <ul>
                                <li><a href="blog-list.html">Blog list</a></li>
                                <li><a href="blog-post.html">Blog-post</a></li>
                            </ul>

                        </li>

                        <li><a href="price-listing.html">Price Listing</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div> <!-- end .header-nav-bar -->
        </div> <!-- end .container -->
    </header> <!-- end #header -->

    <div id="page-content" class="home-slider-content container">
        <?= $content ?>
    </div>

    <footer id="footer">
        <div class="main-footer">

            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-6">
                        <div class="about-globo">
                            <h3>About Globo</h3>

                            <div class="footer-logo">
                                <a href="#"><img src="assets/img/footer_logo.png" alt=""></a>
                                <span></span> <!-- This content for overlay effect -->
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue,
                                suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.</p>

                        </div> <!-- End .about-globo -->
                    </div> <!-- end Grid layout-->

                    <div class="col-md-3 col-sm-6">
                        <h3 >Latest From Blog</h3>

                        <div class="latest-post clearfix">
                            <div class="post-image">
                                <img src="img/content/latest_post_1.jpg" alt="">

                                <p><span>12</span>Sep</p>
                            </div>

                            <h4><a href="#">Post Title Goes Here</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>

                        <div class="latest-post clearfix">
                            <div class="post-image">
                                <img src="img/content/latest_post_2.jpg" alt="">

                                <p><span>09</span>Sep</p>
                            </div>

                            <h4><a href="#">Post Title Goes Here</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div> <!-- end Grid layout-->

                    <div class="col-md-3 col-sm-6 clearfix">
                        <div class="popular-categories">
                            <h3>Popular Categories</h3>

                            <ul>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i>E-commerce</a></li>
                                <li><a href="#"><i class="fa fa-paper-plane-o"></i>Entertainment</a></li>
                                <li><a href="#"><i class="fa fa-cogs"></i>Industry</a></li>
                                <li><a href="#"><i class="fa fa-book"></i>Libraries &amp; Public Office</a></li>
                                <li><a href="#"><i class="fa fa-building-o"></i>Real Estate</a></li>
                            </ul>
                        </div> <!-- end .popular-categories-->
                    </div> <!-- end Grid layout-->

                    <div class="col-md-3 col-sm-6">
                        <div class="newsletter">
                            <h3>Newsletter</h3>

                            <form action="#">
                                <input type="Email" placeholder="Email address">
                                <button><i class="fa fa-plus"></i></button>
                            </form>

                            <h3>Keep In Touch</h3>

                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- end .newsletter-->

                    </div> <!-- end Grid layout-->
                </div> <!-- end .row -->
            </div> <!-- end .container -->
        </div> <!-- end .main-footer -->

        <div class="copyright">
            <div class="container">
                <p>Copyright 2014 &copy; globo. All rights reserved. Powered by  <a href="#">Uouapps</a></p>

                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Shortcodes</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div> <!-- END .container -->
        </div> <!-- end .copyright-->
    </footer> <!-- end #footer -->
</div>
<!-- Scripts -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>