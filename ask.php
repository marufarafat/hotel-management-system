<?php 
$title = "Ask a Question";
include_once 'partials/header.php'; 

if (!$auth->isLoggedIn()) {
    header("location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["ask"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("ask")) {

    $v = new Valitron\Validator($_GET);
    $v->rule('required', ['question', 'description']);

        if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else{
        $question = Hotel\Models\Questions::create(array(
            'question_time'     => date('Y-m-d'), 
            'user_id'           => $auth->getUserId(), 
            'question'          => $_GET["question"], 
            'descriptions'      => $_GET["description"]
        ));
        if ($question) {
            header("Location: forum.php");
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
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>

                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="dex_ask book-form inn-com-form">
                            <form action="" method="get" autocomplete="off">

                                <?php 
                                echo "<pre>";
                                var_dump($misc->getMessages());
                                echo "</pre>";
                                 ?>

                                <h3>Ask Question</h3>
                                <div>
                                    <div class="input-field s12">
                                        <input type="text" name="question" data-ng-model="name1" class="validate">
                                        <label>Question</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s12">
                                        <textarea name="description" id="" cols="30" rows="10" class="validate"></textarea>
                                        <label>Description</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s4">
                                        <input type="submit" name="ask" value="Ask" class="waves-effect waves-light log-in-btn"> </div>
                                </div>
                                <div>
                                    <div class="input-field s12"> <a href="forum.php">If you already asked your question</a> </div>
                                </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("ask"); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->



<?php include_once 'partials/footer.php'; ?>