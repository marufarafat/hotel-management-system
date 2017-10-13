<?php
$headerStyle = array();
$footerScript = array();
$siteTitle = "Edit Booking"; 
include_once 'partials/header.php'; 

$bookid = 0;

if (isset($_GET["bookid"])) {
    $bookid = (int) $_GET["bookid"];
}
if (isset($_POST["id"])) {
    $bookid = (int) $_POST["id"];
}

$book = \Hotel\Models\Booking::find($bookid);

$dateRang = $misc->getCabinAvailableDate($book->cabinid);

$dbBookDate = array($book->date);

$allDates = array_merge($dbBookDate, $dateRang);

if (empty($book)) {
    header("location: booking.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("edit-book")){

    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("bookingDate"));

    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {

        $book->date = $_POST["bookingDate"];

        if ($book->save()) {
            $misc->setMessages("Booking update success.");
        }
    }
}
?>

<div class="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="booking.php">Booking</a></li>
      <li class="breadcrumb-item active"><?php echo $siteTitle; ?></li>
    </ol>
    <h1><?php echo $siteTitle; ?></h1>
    
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">

            <?php $misc->getMessages(); ?>
            
              <div class="form-group">
                <label for="min-adult">Booking date</label>
                <select class="form-control" name="bookingDate" id="min-adult">
                    <?php foreach ($allDates as $date) { ?>
                        <option><?php echo $date; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" name="book" value="Book" class="btn">
              </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("edit-book"); ?>">
            <input type="hidden" name="id" value="<?php echo $book->id; ?>">
            </form>
        </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>