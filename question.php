<?php 
$title = "Question answer";
include_once 'partials/header.php'; 
$questions = \Hotel\Models\Questions::all()->toArray();
$readQues;
$answer;
$questionID;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["answer"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("answer")){

    $v = new Valitron\Validator($_GET);
    $v->rule('required', ['questionanswer', 'questionid']);
    $questionID = $_GET["questionid"];

    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else{
        $answer = Hotel\Models\Answers::create(array(
            'date'          => date('Y-m-d'), 
            'user_id'       => $auth->getUserId(), 
            'question_id'   => $questionID, 
            'answer'        => $_GET["questionanswer"]
        ));
        if ($answer) {
            header("Location: question.php?questionid=$questionID");
        } else{
            $misc->setMessages("something went wrong.");
        }
    }

}
if (isset($_GET["questionid"])) {
    $questionID = $_GET["questionid"];
}
$readQues = \Hotel\Models\Questions::find($questionID);
$user = \Hotel\Models\Users::find($readQues["user_id"])->toArray();
$answers = \Hotel\Models\Answers::where("question_id", $questionID)->get()->toArray();
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
					<!--TYPOGRAPHY SECTION-->
					<div class="col-md-8">
						<div class="head-typo typo-com">
							<h2><?php echo $readQues["question"]; ?></h2>
                            <span class="blog-date"> Date: <?php echo  $readQues["question_time"]; ?></span>  &nbsp;    
                            <span class="blog-author"> Author: <?php echo $user["username"]; ?></span>
							<p><?php echo $readQues["descriptions"]; ?></p>
							<!--EVENT-->
							<div class="aminities">
								<ul>
                                    <?php if (!empty($answers)) {
                                        foreach ($answers as $answer) {
                                            $user = \Hotel\Models\Users::find($answer["user_id"])->toArray();?>
                                            <li class="aminities-line"> <i class="fa fa-comments" aria-hidden="true"></i>
                                                <p><?php echo $answer["answer"]; ?></p>
                                                <small>Date: <?php echo $answer["date"]; ?> | Answered: <?php echo $user["username"]; ?></small>
                                            </li>
                                        <?php }
                                    } ?>
								</ul>
                            <?php if ($auth->isLoggedIn()) {?>
                            <form action="" method="get" autocomplete="off">

                                <?php 
                                echo "<pre>";
                                var_dump($misc->getMessages());
                                echo "</pre>";
                                 ?>

                                <h3>Answer this quenstion</h3>
                                <div>
                                    <div class="input-field s12">
                                        <textarea name="questionanswer" id="" cols="30" rows="10" class="validate"></textarea>
                                        <label>Answer</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-field s4">
                                        <input type="submit" name="answer" value="Answer" class="waves-effect waves-light log-in-btn"> </div>
                                </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("answer"); ?>">
            <input type="hidden" name="questionid" value="<?php echo $_GET["questionid"]; ?>">
                            </form>
                            <?php }else{ ?>
                            <a href="login.php" class="waves-effect waves-light log-in-btn">Answer this question</a>
                            <?php } ?>

							</div>
							<!--END EVENT-->
						</div>
					</div>
					<div class="col-md-4">
                        <div class="head-typo typo-com rec-post">
                            <h3>Recent Questions</h3>
                            <ul>
                                <?php if (!empty($questions)) { $i = 0;
                                    foreach ($questions as $question) {
                                        $user = \Hotel\Models\Users::find($question["user_id"])->toArray(); ?>
                                        <li>
                                            <div class="rec-po-img"> <img src="<?php echo $user["profile_picture"]; ?>" alt="<?php echo $question["question"]; ?>" /> </div>
                                            <div class="rec-po-title"> <a href="question.php?questionid=<?php echo $question["id"]; ?>"><h4><?php echo $question["question"]; ?></h4></a> <span class="blog-date">Date: <?php echo  $question["question_time"]; ?></span> </div>
                                        </li>
                                   <?php $i++;
                                        if ($i >= 6) break;
                                    }
                                } ?>

                            </ul>
                        </div>
					</div>
					<!--END TYPOGRAPHY SECTION-->
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
<?php include_once 'partials/footer.php'; ?>