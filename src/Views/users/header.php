<?php ob_start(); ?>
<header>
    <!-- top-header-->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6 hidden-xs">
                    <p class="top-text">Flexible Delivery, Fast Delivery.</p>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    <ul>
                        <li>+180-123-4567</li>
                        <li>info@demo.com</li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.top-header-->
        </div>
    </div>
    <!-- header-section-->
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                    <div class="logo">
                        <a href="/"><img src="../public/userslte/images/logo.png" alt=""> </a>
                    </div>
                </div>
                <!-- /.logo -->
                <!-- search -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-bg">
                        <form action="/search" method="POST"> <!-- Thay đổi action nếu cần -->
                            <input type="text" name="key" class="form-control" placeholder="Search Here" value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- /.search -->
                <!-- account -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="account-section">
                        <ul>
                            <li><a href="#" class="title hidden-xs">My Account</a></li>
                            <li class="hidden-xs">|</li>
                            <li><a href="#" class="title hidden-xs">Register</a></li>
                            <li><a href="/cart" class="title"><i class="fa fa-shopping-cart"></i> <sup class="cart-quantity">1</sup></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.account -->
                </div>
                <!-- search -->
            </div>
        </div>
        <!-- navigation -->
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- navigations-->
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/productList">Mobiles</a>
                                    <!-- <ul>
                                        <li><a href="/productList">Mobile List</a></li>
                                        <li><a href="/productDetails">Mobile Single </a></li>
                                    </ul> -->
                                </li>
                                </li>
                                <!-- <li class="has-sub"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="/checkout">Checkout Form</a></li>
                                        <li><a href="/cart">Cart</a> </li>
                                        <li><a href="login-form.html">Login</a> </li>
                                        <li><a href="signup-form.html">Signup</a> </li>
                                        <li><a href="404-page.html">404-page</a> </li>
                                    </ul>
                                </li> -->
                                <!-- <li class="has-sub"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog-default.html">Blog Default</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="contact-us.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.navigations-->
                </div>
            </div>
        </div>
    </div>
    <!-- /. header-section-->
</header>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout_template.php');
