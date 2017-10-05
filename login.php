<?php 
$title = "Login";
include_once 'partials/header.php'; ?>
        <!--TOP BANNER-->
        <div class="inn-banner">
            <div class="container">
                <div class="row">
                    <h4><?php echo $title; ?></h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><?php echo $title; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->
        <div class="inn-body-section pad-bot-55">
            <div class="container">
                <div class="row">
                    <div class="page-head">
                        <h2><?php echo $title; ?></h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                        <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="dex_login book-form inn-com-form form-ch-box">
                            <form method="post" autocomplete="off">
                            <h3>Login to your account.</h3>
                                <div>
                                    <div class="input-field s12">
                                        <input type="email" class="validate">
                                        <label>Email id</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s12">
                                        <input type="password" class="validate">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="s12 log-ch-bx">
                                        <p>
                                            <input type="checkbox" id="remember" />
                                            <label for="remember">Remember me</label>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s4">
                                        <input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
                                </div>
                                <div>
                                    <div class="input-field s12"> <a href="registration.php">Create a new account</a> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->



<?php include_once 'partials/footer.php'; ?>