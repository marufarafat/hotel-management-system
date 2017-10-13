<?php 
$title = "Booking";
include_once 'partials/header.php'; 

if (!$auth->isLoggedIn()) {
    header("location: login.php");
}
$cabinid = 0;
if (isset($_GET["cabinid"])) {
    $cabinid = $_GET["cabinid"];
}

$dateRang = $misc->getCabinAvailableDate($cabinid);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["booking"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("booking")){

    // setting conditiion for input field
    $v = new Valitron\Validator($_GET);
    $v->rule('required', array("booking_date", "cabinid"));


    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else{
        $_SESSION["date"] = $_GET["booking_date"];
        $_SESSION["cabinid"] = $_GET["cabinid"];
        if (!empty($_GET["booking_description"])) {
            $_SESSION["booking_description"] = $_GET["booking_description"];
        }
        header("Location: confirm.php");
    }
}
?>
		<div class="inn-body-section inn-booking">
			<div class="container">
				<div class="row">
					<!--TYPOGRAPHY SECTION-->
					<div class="col-md-6">
						<div class="book-title">
							<h2>Cabin Booking</h2>
                            <?php if (empty($dateRang)) { ?>
                                <p>you can't book this cabin on this week.</p>
                            <?php } else{ ?>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <?php } ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="book-form inn-com-form">
							<form class="col s12" action="" method="get">
                                <?php $misc->getMessages(); ?>
								<div class="row">
									<div class="input-field col s12">
										<select  name="booking_date" >
											<option value="" disabled selected>Select your date</option>
                                            <?php foreach ($dateRang as $date) {  ?>
                                                <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
                                            <?php } ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<textarea id="textarea1" name="booking_description" class="materialize-textarea" data-length="120"></textarea>
										<label>Message</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="submit" name="booking" value="submit" class="form-btn"> </div>
								</div>

            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("booking"); ?>">
            <input type="hidden" name="cabinid" value="<?php echo $cabinid; ?>">
							</form>
						</div>
					</div>
					<!--END TYPOGRAPHY SECTION-->
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
<?php include_once 'partials/footer.php'; ?>