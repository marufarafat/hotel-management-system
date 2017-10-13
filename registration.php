<?php 
$title = "Registration";
include_once 'partials/header.php'; 

// checking login or not
if ($auth->isLoggedIn()) {
    header("location: dashboard.php");
}

// checking condition for registration form using csrf protection
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("register")) {

    // setting conditiion for input field
    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("username", "email", "password", "confirm-password"));
    $v->rule("equals", "password", "confirm-password");
    // need to send min lenth to password
    $v->rule("regex", "username", "/^[a-z0-9_.-]{4,20}$/");
    $v->rule("email", "email");

    // checking if have error
    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {

        try {
            $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username']);
            header("Location: login.php");
        } catch (\Delight\Auth\InvalidEmailException $e) {
            $misc->setMessages("Email is not a valid email address2");
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            $misc->setMessages("Password is not a valid.");
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            $misc->setMessages("User already exist in database.");
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
                        <div class="dex_registration book-form inn-com-form">
                            <form action="" method="post" autocomplete="off">

                                <?php $misc->getMessages(); ?>

                                <h3>Create an account.</h3>
                                <div>
                                    <div class="input-field s12">
                                        <input type="text" name="username" data-ng-model="name1" class="validate">
                                        <label>User name</label>
                                    </div>
                                </div>
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
                                    <div class="input-field s12">
                                        <input type="password" name="confirm-password" class="validate">
                                        <label>Confirm password</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s4">
                                        <input type="submit" name="register" value="Register" class="waves-effect waves-light log-in-btn"> </div>
                                </div>
                                <div>
                                    <div class="input-field s12"> <a href="login.php">Are you a already member ? Login</a> </div>
                                </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("register"); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->

<?php include_once 'partials/footer.php'; ?>