<?php ob_start();
include(__DIR__ . '/header.php');
?>
<!-- main -->
<main>
    <!-- page-header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Login</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- login-form -->

    <div class="content">
        <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12 ">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                    <h3 class="mb10">Login</h3>
                                </div>
                                <!-- form -->
                                <form action="/auth/validate" method="post">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <div class="login-input">
                                                <input id="email" name="email" type="text" class="form-control"
                                                    placeholder="Enter your email" required>
                                                <div class="login-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label sr-only"></label>
                                            <div class="login-input">
                                                <input id="password" name="password" type="password"
                                                    class="form-control" placeholder="******" required>
                                                <div class="login-icon"><i class="fa fa-lock"></i></div>
                                                <div class="eye-icon"><i class="fa fa-eye"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20 ">
                                        <button type="submit" class="btn btn-primary btn-block mb10">Login</button>
                                        <div>
                                            <p>Don't have an Acount? <a href="/signup">Register now</a></p>
                                        </div>
                                    </div>
                                </form>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                    <h4 class="mb20">Login With</h4>
                                    <div class="social-media">
                                        <a href="#" class="btn-social-rectangle btn-facebook"><i
                                                class="fa fa-facebook"></i><span class="social-text">Facebook</span></a>
                                        <a href="#" class="btn-social-rectangle btn-twitter"><i
                                                class="fa fa-twitter"></i><span class="social-text">Twitter</span> </a>
                                        <a href="#" class="btn-social-rectangle btn-googleplus"><i
                                                class="fa fa-google-plus"></i><span class="social-text">Google
                                                Plus</span></a>
                                    </div>
                                </div>
                                <!-- /.form -->
                            </div>
                        </div>
                    </div>
                    <!-- features -->
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                        <div class="box-body">
                            <div class="feature-left">
                                <div class="feature-icon">
                                    <img src="images/feature_icon_1.png" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Loyalty Points</h4>
                                    <p>Aenean lacinia dictum risvitae pulvinar disamer seronorem ipusm dolor sit manert.
                                    </p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon">
                                    <img src="images/feature_icon_2.png" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Instant Checkout</h4>
                                    <p>Aenean lacinia dictum risvitae pulvinar disamer seronorem ipusm dolor sit manert.
                                    </p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon">
                                    <img src="images/feature_icon_3.png" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Exculsive Offers</h4>
                                    <p>Aenean lacinia dictum risvitae pulvinar disamer seronorem ipusm dolor sit manert.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.features -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-form -->
</main>
<?php include_once(__DIR__ . '/footer.php'); ?>
<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '/../../../templates/layout_template.php');
?>