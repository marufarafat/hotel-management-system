<?php 
$title = "Confirm";
include_once 'partials/header.php'; 

$cabin = \Hotel\Models\Cabin::find($_SESSION["cabinid"])->toArray();

$cabinType = \Hotel\Models\CabinType::find($cabin["type"])->toArray();

$bookingDate = explode(" to ", $_SESSION["date"]);

$currency = null;
if (isset($_GET["currency"])) {
    $currency = $_GET["currency"];
}

// price 
$defCurrency;
if ($currency == null) { 
    $defCurrency = $cabin["price"];
} else { 
    $defCurrency = $cabin["price"] * $converter->convert("usd", $currency) . '&nbsp;'. strtoupper($currency);
}

$mailContent = '
<h2>Confirmation</h2>
<p>Please check information exactly and if you find any mistakes please contact us</p>
<h3>User information</h3>
<table>
    <tr>
        <td class="key">Full Name: </td>
        <td> ' . $user["full_name"] . '</td>
    </tr>
    <tr>
        <td class="key">Email: </td>
        <td> ' . $user["email"] . '</td>
    </tr>
    <tr>
        <td class="key">Phone: </td>
        <td> ' . $user["phone"] . '</td>
    </tr>
    <tr>
        <td class="key">Address:</td>
        <td>' . $user["address1"] . $user["city"] . $user["postcode"] . '</td>
    </tr>
</table>
<h3>Purchese Information</h3>
<table>
    <tr>
        <td>Arrival Date: </td>
        <td class="value">' . current($bookingDate) . '</td>
    </tr>
    <tr>
        <td>Departure Date: </td>
        <td class="value"> ' . end($bookingDate) . '</td>
    </tr>
    <tr>
        <td>Cabin: </td>
        <td class="value">' . $cabin["name"] . '</td>
    </tr>
    <tr>
        <td>Adult: </td>
        <td class="value">2</td>
    </tr>
    <tr>
        <td>Children: </td>
        <td class="value">2</td>
    </tr>
    <tr>
        <td>Cabin Type: </td>
        <td class="value">' . $cabinType["name"] . '</td>
    </tr>
</table>
<hr>
<table>
    <tr>
        <td>TOTAL: </td>
        <td class="value">$ ' . $defCurrency . '</td>
    </tr>
</table> 
';

if (isset($_GET["confirm"]) && $_GET["confirm"] == true && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("confirm")) {

    $createBooking = \Hotel\Models\Booking::create(array(
        "cabinid"       => $_SESSION["cabinid"],
        "date"          => $_SESSION["date"],
        "totalPrice"    => $cabin["price"],
        "user"          => $auth->getUserId()
    ));

    if ($createBooking->save()) {

        // send configuration
        $mail->setFrom('poltu@gmail.com', 'First Last');
        $mail->addAddress('marufarafat@gmail.com', 'John Doe');
        $mail->Subject = 'Confirm booking';
        $mail->msgHTML($mailContent);

        if (!$mail->send()) {
            die;
        } else {
            header("Location: index.php");
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
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <?php include_once 'partials/confirmation.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->

<?php include_once 'partials/footer.php'; ?>