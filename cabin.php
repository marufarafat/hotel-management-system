<?php 
$title = "Cabin";
include_once 'partials/header.php'; 

if (isset($_GET["cabinid"])) {
    $cabinId = (int) $_GET["cabinid"];
    $cabin = \Hotel\Models\Cabin::find($cabinId)->toArray();
}
if (empty($cabin)) {
    header("Location: cabins.php");
}
$cabinType = \Hotel\Models\CabinType::find($cabin["type"]);
?>
		<div class="hp-banner"> <img src="<?php echo $cabin["cabin_img"]; ?>" alt=""> </div>
		<!--END HOTEL ROOMS-->
		<!--END CHECK AVAILABILITY FORM-->
		<div class="hom-com">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="hp-section">
								<div class="hp-sub-tit">
									<h4><?php echo $cabin["name"]; ?></h4>
								</div>
								<div class="hp-amini">
									<p><?php echo $cabin["descriptions"]; ?></p>
								</div>
							</div>
							<div class="hp-section">
								<div class="hp-sub-tit">
									<h4> Cabin <span>Facility</span></h4>
									<p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
								</div>
								<div class="hp-amini">
									<ul>
										<li><img src="images/icon/a1.png" alt=""> Elevator in building</li>
										<li><img src="images/icon/a2.png" alt=""> Friendly workspace</li>
										<li><img src="images/icon/a3.png" alt=""> Instant Book</li>
										<li><img src="images/icon/a4.png" alt=""> Wireless Internet</li>
										<li><img src="images/icon/a5.png" alt=""> Free parking on premises</li>
										<li><img src="images/icon/a6.png" alt=""> Free parking on street</li>
										<li><img src="images/icon/a7.png" alt=""> Elevator in building</li>
										<li><img src="images/icon/a8.png" alt=""> Friendly workspace</li>
										<li><img src="images/icon/a9.png" alt=""> Instant Book</li>
										<li><img src="images/icon/a10.png" alt=""> Wireless Internet</li>
										<li><img src="images/icon/a11.png" alt=""> Free parking on premises</li>
										<li><img src="images/icon/a12.png" alt=""> Free parking on street</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<!--=========================================-->
						<div class="hp-call hp-right-com">
                            <div class="hotel_detials_area">
                                <ul>
                                    <li>Special Offer Start Date: <span><?php echo $cabin["so_start_date"]; ?></span></li>
                                    <li>Special Offer End Date: <span><?php echo $cabin["so_end_date"]; ?></span></li>
                                    <li>Special Offer Price: $ <span><?php echo $cabin["so_price"]; ?></span></li>
                                    <li>Cabin Type: <span><?php echo $cabinType["name"]; ?></span></li>
                                </ul>
                            </div>
							<div class="hp-call-in">
								<h3><span>Price</span> $ <?php echo $cabin["price"]; ?></h3><a href="booking.php?cabinid=<?php echo $cabin["id"]; ?>">Book this Cabin</a> </div>
						</div>
						<!--=========================================-->
						<!--=========================================-->
						<div class="hp-card hp-right-com">
							<div class="hp-card-in">
								<h3>We Accept</h3> <span>159 people bookmarked this place</span> <img src="images/card.png" alt=""> </div>
						</div>
						<!--=========================================-->
					</div>
				</div>
			</div>
		</div>
<?php include_once 'partials/footer.php'; ?>