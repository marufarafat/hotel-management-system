<?php 
$title = "Forum";
include_once 'partials/header.php'; 

$questions = \Hotel\Models\Questions::orderBy('id', 'DESC')->get()->toArray();

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
		<div class="inn-body-section pad-bot-50">
			<div class="container">
				<div class="row inn-page-com">
					<div class="page-head">
						<h2>Forum Question</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
					</div>
					<!--SERVICES SECTION-->
					<div class="col-md-8">

                        <?php if (!empty($questions)) {
                            foreach ($questions as $question) {
                                $user = \Hotel\Models\Users::find($question["user_id"])->toArray(); ?>
                            <div class="dex_forum row inn-services in-blog">
                                <div class="col-md-2"> <img src="<?php echo $user["profile_picture"]; ?>" alt="<?php echo $question["question"]; ?>" /> </div>
                                <div class="col-md-10">
                                    <a href="question.php?questionid=<?php echo $question["id"]; ?>"><h3><?php echo $question["question"]; ?></h3> </a>
                                    <span class="blog-date">Date: <?php echo  $question["question_time"]; ?></span> 
                                    <span class="blog-author">Author: <?php echo $user["username"]; ?></span>
                                    <a href="question.php?questionid=<?php echo $question["id"]; ?>" class="forum-readmore waves-effect waves-light inn-re-mo-btn">Read More</a> </div>
                            </div>
                                
                            <?php }
                        } ?>

					</div>
					<div class="col-md-4">
                        <div class="head-typo typo-com">
                            <a href="ask.php" class="btn waves-effect waves-light btn-lg btn-primary btn-lg btn-block">Ask a Question</a>
                        </div>
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
					<!--END SERVICES SECTION-->
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
<?php include_once 'partials/footer.php'; ?>