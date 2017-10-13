<?php
$headerStyle = array();
$footerScript = array();
$siteTitle = "Edit Cabins"; 
include_once 'partials/header.php'; 

// gettting all cabin type
$cabinTypes = \Hotel\Models\CabinType::get()->toArray();

$cabinid = null;

if (isset($_GET["editcabinid"])) {
    $cabinid = (int) $_GET["editcabinid"];
}
if (isset($_POST["id"])) {
    $cabinid = $_POST["id"];
}
$cabin = \Hotel\Models\Cabin::find($cabinid);

if (empty($cabin)) {
    header("location: cabins.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cabin"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("careate-cabin")){

    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("cabin-name", "cabin-price", "cabin-type", "cabin-description", "so_start_date", "so_end_date", "so_price"));

    //upload image to upload folder
    if (!empty($_FILES['cabin_picture'])) {
        $cpic = $misc->imageProcess($_FILES['cabin_picture'], "../uploads/cabins/", 1500, 400);
        $thumpic = $misc->imageProcess($_FILES['cabin_picture'], "../uploads/cabins/thumb/", 950, 650);
        $cabin->cabin_img = $cpic;
        $cabin->cabin_thumb = $thumpic;
    }

    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {
        $cabin->name          = $_POST["cabin-name"];
        $cabin->cabin_img     = $cpic;
        $cabin->cabin_thumb   = $thumpic;
        $cabin->so_start_date = $_POST["so_start_date"];
        $cabin->so_end_date   = $_POST["so_end_date"];
        $cabin->so_price      = $_POST["so_price"];
        $cabin->price         = $_POST["cabin-price"];
        $cabin->type          = $_POST["cabin-type"];
        $cabin->descriptions  = $_POST["cabin-description"];

        if ($cabin->save()) {
            $misc->setMessages("Cabin update success.");
        }
    }
}
?>

<div class="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="cabins.php">Cabin</a></li>
      <li class="breadcrumb-item active"><?php echo $siteTitle; ?></li>
    </ol>
    <h1><?php echo $siteTitle; ?></h1>
    
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">

                <?php $misc->getMessages(); ?>


              <div class="form-group">
                <label for="cabin-name">Cabin Name</label>
                <input type="text" class="form-control" value="<?php echo $cabin->name; ?>" name="cabin-name" id="cabin-name">
              </div>
              <div class="form-group">
                <label for="cabin-price">Cabin Price</label>
                <input type="text" class="form-control" value="<?php echo $cabin->price; ?>" name="cabin-price"  id="cabin-price">
              </div>
              <div class="form-group">
                <label for="cabin-price">Cabin Picture</label>
                    <input name="cabin_picture" type="file" />
              </div>
              <?php if (!empty($cabinTypes)) { ?>
              <div class="form-group">
                <label for="cabin-type">Cabin Type</label>
                <select class="form-control" name="cabin-type" id="cabin-type">
                    <?php foreach ($cabinTypes as $ct) { ?>
                    <option <?php if ($cabin->type == $ct["id"]) echo "selected"; ?> value="<?php echo $ct["id"]; ?>"><?php echo $ct["name"]; ?></option>
                    <?php } ?>
                </select>
              </div>
              <?php } ?>
              <div class="form-group">
                <label for="cabin-description">Cabin Description</label>
                <textarea class="form-control" name="cabin-description" id="cabin-description" rows="3">"<?php echo $cabin->descriptions; ?></textarea>
              </div>
              <br>
              <h3>Special Offer Area</h3>
              <div class="form-group">
                <label for="so_start_date">special offer start date</label>
                <input type="date" class="form-control" value="<?php echo $cabin->so_start_date; ?>" name="so_start_date" id="so_start_date">
              </div>
              <div class="form-group">
                <label for="so_end_date">special offer end date</label>
                <input type="date" class="form-control" value="<?php echo $cabin->so_end_date; ?>" name="so_end_date" id="so_end_date">
              </div>
              <div class="form-group">
                <label for="so_price">special offer price</label>
                <input type="text" class="form-control" value="<?php echo $cabin->so_price; ?>" name="so_price" id="so_price">
              </div>
              <br>
              <h3>Facility</h3>
              <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="facility[]" value="Swimming pool" > Swimming pool</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="facility[]" value="Breakfast"> Breakfast</label>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="cabin" value="Cabin" class="btn">
              </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("careate-cabin"); ?>">
            <input type="hidden" name="id" value="<?php echo $cabin["id"]; ?>">
            </form>
        </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>