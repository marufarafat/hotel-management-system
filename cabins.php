<?php 
$title = "Cabins";
include_once 'partials/header.php'; 

$currency = null;
if (isset($_GET["currency"])) {
    $currency = $_GET["currency"];
}

$cabins = \Hotel\Models\Cabin::orderBy('id', 'DESC')->get()->toArray();

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
                    <?php  if (!empty($cabins)) {
                        foreach ($cabins as $cabin) {
                            $cabinType = \Hotel\Models\CabinType::find($cabin["type"]); 
                            $booking = \Hotel\Models\Booking::where("cabinid", $cabin["id"])->get()->toArray();
                            $dateRang = $misc->dateRange();
                            foreach ($booking as $book) {
                                $index = array_search($book["date"], $dateRang);
                                unset($dateRang[$index]);
                            } ?>
                        
                    <!--ROOM SECTION-->
                    <div class="room">
                        <!--ROOM IMAGE-->
                        <a href="cabin.php?cabinid=<?php echo $cabin["id"]; ?>">
                            <div class="r1 r-com"><img src="<?php echo $cabin["cabin_thumb"]; ?>" alt="" />
                            </div>
                            <div class="r2 r-com">
                                <h4><?php echo $cabin["name"]; ?></h4>
                                <ul>
                                    <li>Min Adult : 2</li>
                                    <li>Min Adult : 2</li>
                                    <li>Cabin Type : <?php echo $cabinType["name"]; ?></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </a>
                        <!--ROOM AMINITIES-->
                        <div class="r3 r-com">
                            <ul>
                                <li>Lavish style</li>
                                <li>Hot tubs</li>
                                <?php if (!empty($cabin["facility"])) {
                                    $facilities = unserialize($cabin["facility"]);
                                    foreach ($facilities as $f) { ?>
                                        <li><?php echo $f ?></li>
                                   <?php  }
                                } ?>
                            </ul>
                        </div>
                        <!--ROOM PRICE-->
                        <div class="dex_cabin_price r4 r-com">
                            <p>Price for 1 night</p>
                            <p>
                                <span class="room-price-1"><?php  if ($currency == null) { echo $cabin["price"]; } else { echo $cabin["price"] * $converter->convert("usd", $currency); echo '&nbsp;' . strtoupper($currency); } ?></span> 
                            </p>
                            <p>Non Refundable</p>
                        </div>
                        <!--ROOM BOOKING BUTTON-->
                        <div class="dex_cabin_available r5 r-com">
                            <?php if (!empty($dateRang)) { ?>
                                <div class="r2-available">Available</div>
                            <?php 
                            foreach ($dateRang as $date) { ?>
                                <p><?php echo $date; ?></p>
                            <?php }
                        } else{ ?>
                                <div class="not-available">Not Available</div>                        
                        <?php } ?>
                            <a href="booking.php?cabinid=<?php echo $cabin["id"]; ?>" class="inn-room-book">Book</a> </div>
                    </div>
                    <!--END ROOM SECTION-->                        
                        <?php }
                    } ?>
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
<?php include_once 'partials/footer.php'; ?>