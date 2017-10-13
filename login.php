<?php 
$title = "Login";
include_once 'partials/header.php'; 


// checking login or not
if ($auth->isLoggedIn()) {
    header("location: dashboard.php");
}

// checking login form submited or not 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("login")) {

    $v = new Valitron\Validator($_POST);
    $v->rule('required', ['email', 'password']);
    $v->rule('email', 'email');

    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else{

        if (isset($_POST['remember']) && $_POST['remember'] == "on") {
            // keep logged in for one year
            $rememberDuration = (int) (60 * 60 * 24 * 365.25);

        } else {
            // do not keep logged in after session ends
            $rememberDuration = null;
        }
        try {
            $auth->login($_POST['email'], $_POST['password'], $rememberDuration);

            if ($auth->admin()->doesUserHaveRole($auth->getUserId(), \Delight\Auth\Role::ADMIN)) {
                header("location: admin/");
            } else {
                header("Location: dashboard.php");
            }
            

        }  catch (\Delight\Auth\InvalidEmailException $e) {
            $misc->setMessages("Wrong credentials.");
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            $misc->setMessages("Wrong credentials.");
        } catch (\Delight\Auth\EmailNotVerifiedException $e) {
            $misc->setMessages("Wrong credentials.");
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            $misc->setMessages("Bad request.");
        }
    }
}

?>
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
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="dex_login book-form inn-com-form form-ch-box">
                            <form method="post" action="" autocomplete="off">
                            <h3>Login to your account.</h3>

                                <?php $misc->getMessages(); ?>

                                <div>
                                    <div class="input-field s12">
                                        <input type="email" name="email" class="validate">
                                        <label>Email id</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s12">
                                        <input type="password" name="password" class="validate">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="s12 log-ch-bx">
                                        <p>
                                            <input type="checkbox" name="remember" id="remember" />
                                            <label for="remember">Remember me</label>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s4">
                                        <input type="submit" value="Login" name="login" class="waves-effect waves-light log-in-btn"> </div>
                                </div>
                                <div>
                                    <div class="input-field s12"> <a href="registration.php">Create a new account</a> </div>
                                </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("login"); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->



<?php include_once 'partials/footer.php'; ?>