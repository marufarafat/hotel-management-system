<?php
$headerStyle = array();
$footerScript = array();
$siteTitle = "Cabins"; 
include_once 'partials/header.php'; 


// gettting all cabin type
$cabinTypes = \Hotel\Models\CabinType::get()->toArray();

// create cabin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cabin"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("careate-cabin")){

    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("cabin-name", "cabin-price", "cabin-type", "cabin-description", "so_start_date", "so_end_date", "so_price"));

    //upload image to upload folder
    $cpic = $misc->imageProcess($_FILES['cabin_picture'], "../uploads/cabins/", 1500, 400);
    $thumpic = $misc->imageProcess($_FILES['cabin_picture'], "../uploads/cabins/thumb/", 950, 650);

    $facility = null;
    if (isset($_POST["facility"])) {
        $facility = serialize($_POST["facility"]);
    }

    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    }elseif(!$cpic){
        $misc->setMessages("Please select Cabin picture.");

    } else {
        // create cabin using eloquent model
        $cabin = \Hotel\Models\Cabin::create(array(
            'name'          => $_POST["cabin-name"], 
            'cabin_img'     => $cpic,
            'cabin_thumb'   => $thumpic,
            'so_start_date' => $_POST["so_start_date"], 
            'so_end_date'   => $_POST["so_end_date"], 
            'so_price'      => $_POST["so_price"], 
            'price'         => $_POST["cabin-price"],
            'type'          => $_POST["cabin-type"], 
            'descriptions'  => $_POST["cabin-description"],
            'facility'      => $facility
        ));
        if ($cabin->save()) {
            $misc->setMessages("Cabin Create success.");
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
                <input type="text" class="form-control" name="cabin-name" id="cabin-name">
              </div>
              <div class="form-group">
                <label for="cabin-price">Cabin Price</label>
                <input type="text" class="form-control" name="cabin-price"  id="cabin-price">
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
                    <option value="<?php echo $ct["id"]; ?>"><?php echo $ct["name"]; ?></option>
                    <?php } ?>
                </select>
              </div>
              <?php } ?>
              <div class="form-group">
                <label for="cabin-description">Cabin Description</label>
                <textarea class="form-control" name="cabin-description" id="cabin-description" rows="3"></textarea>
              </div>
              <br>
              <h3>Special Offer Area</h3>
              <div class="form-group">
                <label for="so_start_date">special offer start date</label>
                <input type="date" class="form-control" name="so_start_date" id="so_start_date">
              </div>
              <div class="form-group">
                <label for="so_end_date">special offer end date</label>
                <input type="date" class="form-control" name="so_end_date" id="so_end_date">
              </div>
              <div class="form-group">
                <label for="so_price">special offer price</label>
                <input type="text" class="form-control" name="so_price" id="so_price">
              </div>
              <br>
              <h3>Facility</h3>
              <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="facility[]" value="Swimming pool"> Swimming pool</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="facility[]" value="Breakfast"> Breakfast</label>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="cabin" value="Cabin" class="btn">
              </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("careate-cabin"); ?>">
            </form>
        </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>