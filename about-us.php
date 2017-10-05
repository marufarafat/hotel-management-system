<?php 
$title = "About us";
include_once 'partials/header.php'; ?>
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4><?php echo $title; ?></h4>
					<p>Curabitur auctor, massa sed interdum ornare, nulla sem vestibulum purus, eu maximus magna urna eu nunc.</p>
					<p> </p>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><?php echo $title; ?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="inn-body-section">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2><?php echo $title; ?></h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Quisque at volutpat nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="about-left">
							<h2>Welcome to <span>My Hotel</span></h2>
							<h4>Cras eu nisl quis est mattis placerat. Etiam ut ante et lacus imperdiet sagittis a finibus mauris.</h4>
							<p>Proin nisl mi, eleifend in faucibus et, venenatis eu turpis. Ut hendrerit eleifend odio. Nullam ullamcorper viverra ex quis tempus. In hac habitasse platea dictumst. Vestibulum sed tempor metus. </p>
							<p>Duis sollicitudin augue nec bibendum mollis. Proin luctus diam vel hendrerit dictum. Nunc tincidunt nibh in sem blandit venenatis. Suspendisse rutrum ultricies porttitor. Quisque at volutpat nibh.Aliquam dapibus turpis mollis felis fermentum bibendum. In finibus a nulla vitae dapibus. Nam non suscipit urna. Vestibulum et lacinia justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> <a href="#" class="link-btn">Call to us: (+404) 142 21 23 78</a> </div>
					</div>
					<div class="col-md-6">
						<div class="about-right"> <img src="images/about.jpg" alt=""> </div>
					</div>
				</div>
			</div>
		</div>
    <?php include_once 'partials/footer.php'; ?>