<?php 
$title = "Home";
include_once 'partials/header.php'; 

$currency = null;
if (isset($_GET["currency"])) {
    $currency = $_GET["currency"];
}

$cabins = \Hotel\Models\Cabin::orderBy('id', 'DESC')->get()->toArray();

?>
		<!--Check Availability SECTION-->
		<div>
			<div class="slider fullscreen">
				<ul class="slides">
					<li> <img src="images/slider/1.jpg" alt="">
						<!-- random image -->
						<div class="caption center-align slid-cap">
							<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							<h2>This is our big Tagline!</h2>
							<p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a><a href="#">Booking</a> </div>
					</li>
					<li> <img src="images/slider/2.jpg" alt="">
						<!-- random image -->
						<div class="caption center-align slid-cap">
							<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							<h2>This is our big Tagline!</h2>
							<p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a><a href="#">Booking</a> </div>
					</li>
					<li> <img src="images/slider/3.jpg" alt="">
						<!-- random image -->
						<div class="caption center-align slid-cap">
							<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							<h2>This is our big Tagline!</h2>
							<p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a><a href="#">Booking</a> </div>
					</li>
					<li> <img src="images/slider/4.jpg" alt="">
						<!-- random image -->
						<div class="caption center-align slid-cap">
							<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
							<h2>This is our big Tagline!</h2>
							<p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a><a href="#">Booking</a> </div>
					</li>
				</ul>
			</div>
		</div>
		<!--End Check Availability SECTION-->
		<!--HOTEL ROOMS SECTION-->
		<div class="hom1 hom-com pad-bot-40">
			<div class="container">
				<div class="row">
					<div class="hom1-title">
						<h2>Our Cabin</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
					</div>
				</div>
				<div class="row">
					<div class="to-ho-hotel">
						<!-- HOTEL GRID -->
                    <?php  if (!empty($cabins)) {
                        foreach ($cabins as $cabin) {
                            $cabinType = \Hotel\Models\CabinType::find($cabin["type"]); 
                            $dateRang = $misc->getCabinAvailableDate($cabin["id"]); ?>

						<div class="col-md-4">
							<div class="to-ho-hotel-con">
								<div class="to-ho-hotel-con-1">
									<img src="<?php echo $cabin["cabin_thumb"]; ?>" alt=""> </div>
								<div class="to-ho-hotel-con-23">
									<div class="to-ho-hotel-con-2"> <a href="cabin.php?cabinid=<?php echo $cabin["id"]; ?>"><h4><?php echo $cabin["name"]; ?></h4></a> </div>
									<div class="to-ho-hotel-con-3">
										<ul>
                            <?php if (!empty($dateRang)) { ?>
                                <div class="r2-available">Available</div>
                            <?php 
                            foreach ($dateRang as $date) { ?>
                                <li><?php echo $date; ?></li>
                            <?php }
                        } else{ ?>
                                <div class="not-available">Not Available</div>                        
                        <?php } ?>
											<li><span class="ho-hot-pri"><?php  if ($currency == null) { echo $cabin["price"]; } else { echo $cabin["price"] * $converter->convert("usd", $currency); echo '&nbsp;' . strtoupper($currency); } ?></span> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
                
                        <?php }
                    } ?>
					</div>
				</div>
			</div>
		</div>
		<!--END HOTEL ROOMS-->
		<!--TOP SECTION-->
		<div class="offer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Standardized Budget Rooms</span> <span class="ol-3"></span> <span class="ol-5">$99/-</span>
							<ul>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis1.png" alt="">
									</a><span>Free WiFi</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/h2.png" alt=""> </a><span>Breakfast</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis3.png" alt=""> </a><span>Pool</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis4.png" alt=""> </a><span>Television</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis5.png" alt=""> </a><span>GYM</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="offer-r">
							<div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
							<div class="or-2"> <span class="or-21">Get</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog hom-com pad-bot-0">
			<div class="container">
				<div class="row">
					<div class="hom1-title">
						<h2>Photo Gallery</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="inn-services head-typo typo-com mar-bot-0">
							<ul id="filters" class="clearfix">
								<li><span class="filter active" data-filter=".app, .card, .icon, .logo, .web">All</span>
								</li>
								<li><span class="filter" data-filter=".app">Hotels</span>
								</li>
								<li><span class="filter" data-filter=".card">Aminities</span>
								</li>
								<li><span class="filter" data-filter=".icon">Rooms</span>
								</li>
								<li><span class="filter" data-filter=".logo">Food Menu</span>
								</li>
								<li><span class="filter" data-filter=".web">Events</span>
								</li>
							</ul>
							<div id="portfoliolist">
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/5.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio app" data-cat="app">
									<div class="portfolio-wrapper"> <img src="img/portfolios/app/1.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">APP</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio web" data-cat="web">
									<div class="portfolio-wrapper"> <img src="img/portfolios/web/4.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Web design</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio card" data-cat="card">
									<div class="portfolio-wrapper"> <img src="img/portfolios/card/1.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio app" data-cat="app">
									<div class="portfolio-wrapper"> <img src="img/portfolios/app/3.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">APP</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio card" data-cat="card">
									<div class="portfolio-wrapper"> <img src="img/portfolios/card/4.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio card" data-cat="card">
									<div class="portfolio-wrapper"> <img src="img/portfolios/card/5.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/1.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio app" data-cat="app">
									<div class="portfolio-wrapper"> <img src="img/portfolios/app/2.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">APP</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio card" data-cat="card">
									<div class="portfolio-wrapper"> <img src="img/portfolios/card/2.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/6.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/7.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio icon" data-cat="icon">
									<div class="portfolio-wrapper"> <img src="img/portfolios/icon/4.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Icon</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio web" data-cat="web">
									<div class="portfolio-wrapper"> <img src="img/portfolios/web/3.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Web design</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio icon" data-cat="icon">
									<div class="portfolio-wrapper"> <img src="img/portfolios/icon/1.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Icon</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio web" data-cat="web">
									<div class="portfolio-wrapper"> <img src="img/portfolios/web/2.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Web design</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio icon" data-cat="icon">
									<div class="portfolio-wrapper"> <img src="img/portfolios/icon/2.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Icon</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio icon" data-cat="icon">
									<div class="portfolio-wrapper"> <img src="img/portfolios/icon/5.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">3D Map</a> <span class="text-category">Icon</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio web" data-cat="web">
									<div class="portfolio-wrapper"> <img src="img/portfolios/web/1.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Note</a> <span class="text-category">Web design</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/3.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Native Designers</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/4.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Bookworm</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio icon" data-cat="icon">
									<div class="portfolio-wrapper"> <img src="img/portfolios/icon/3.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Sandwich</a> <span class="text-category">Icon</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio card" data-cat="card">
									<div class="portfolio-wrapper"> <img src="img/portfolios/card/3.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Reality</a> <span class="text-category">Business card</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
								<div class="portfolio logo" data-cat="logo">
									<div class="portfolio-wrapper"> <img src="img/portfolios/logo/2.jpg" alt="" />
										<div class="label">
											<div class="label-text"> <a class="text-title">Speciallisterne</a> <span class="text-category">Logo</span> </div>
											<div class="label-bg"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="blog hom-com pad-bot-0">
            <div class="container">
                <div class="row">
                    <div class="hom1-title">
                        <h2>Banquet Spaces & Meeting Rooms</h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                        <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <div class="col-md-3 n2-event">
                            <!--event IMAGE-->
                            <div class="n21-event hovereffect"> <img src="images/event/1.jpg" alt="">
                                <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                            </div>
                            <!--event DETAILS-->
                            <div class="n22-event"> <a href="#!"><h4>Wedding Halls</h4></a> <span class="event-date">Capacity: 500,</span> <span class="event-by"> Price: $900</span>
                                <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                                <!--event SHARE-->
                                <div class="event-share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 n2-event">
                            <!--event IMAGE-->
                            <div class="n21-event hovereffect"> <img src="images/event/2.jpg" alt="">
                                <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                            </div>
                            <!--event DETAILS-->
                            <div class="n22-event"> <a href="#!"><h4>Business Meetings</h4></a> <span class="event-date">Capacity: 500,</span> <span class="event-by"> Price: $700</span>
                                <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                                <!--event SHARE-->
                                <div class="event-share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 n2-event">
                            <!--event IMAGE-->
                            <div class="n21-event hovereffect"> <img src="images/event/3.jpg" alt="">
                                <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                            </div>
                            <!--event DETAILS-->
                            <div class="n22-event"> <a href="#!"><h4>Social Event</h4></a> <span class="event-date">Capacity: 420,</span> <span class="event-by"> Price: $750</span>
                                <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                                <!--event SHARE-->
                                <div class="event-share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 n2-event">
                            <!--event IMAGE-->
                            <div class="n21-event hovereffect"> <img src="images/event/4.jpg" alt="">
                                <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                            </div>
                            <!--event DETAILS-->
                            <div class="n22-event"> <a href="#!"><h4>Birthdays and Debut</h4></a> <span class="event-date">Capacity: 240,</span> <span class="event-by"> Price: $500</span>
                                <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                                <!--event SHARE-->
                                <div class="event-share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="blog hom-com">
		</div>
<?php include_once 'partials/footer.php'; ?>