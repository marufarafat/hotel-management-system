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
if (isset($_GET["id"])) {
    $cabinid = $_GET["id"];
}
$cabin = \Hotel\Models\Cabin::find($cabinid);

if (empty($cabin)) {
    header("location: cabins.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cabin"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("careate-cabin")){

    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("cabin-name", "min-adult", "min-child", "cabin-price", "cabin-type", "cabin-description"));

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

        $cabin->name = $_POST["cabin-name"];
        $cabin->min_adult = $_POST["min-adult"];
        $cabin->min_child = $_POST["min-child"];
        $cabin->price = $_POST["cabin-price"];
        $cabin->type = $_POST["cabin-type"];
        $cabin->descriptions = $_POST["cabin-description"];

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

                <?php 
                echo "<pre>";
                var_dump($misc->getMessages());
                echo "</pre>";
                 ?>

              <div class="form-group">
                <label for="cabin-name">Cabin Name</label>
                <input type="text" value="<?php echo $cabin["name"]; ?>" class="form-control" name="cabin-name" id="cabin-name">
              </div>
              <div class="form-group">
                <label for="min-adult">Min Adult</label>
                <select class="form-control" name="min-adult" id="min-adult">
                    <?php for($i = 2;$i<6;$i++){ ?>
                    <option <?php if ($i == $cabin["min_adult"]) echo 'selected="selected"';  ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="min-child">Min Child</label>
                <select value="<?php echo $cabin["min_child"]; ?>" class="form-control" name="min-child" id="min-child">
                    <?php for($i = 2;$i<6;$i++){ ?>
                    <option <?php if ($i == $cabin["min_child"]) echo 'selected="selected"';  ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="cabin-price">Cabin Price</label>
                <input value="<?php echo $cabin["price"]; ?>" type="text" class="form-control" name="cabin-price"  id="cabin-price">
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
                    <option value="<?php echo $ct["id"]; ?>" <?php if ($ct["id"] == $cabin["type"]) echo 'selected="selected"'; ?>><?php echo $ct["name"]; ?></option>
                    <?php } ?>
                </select>
              </div>
              <?php } ?>
              <div class="form-group">
                <label for="cabin-description">Cabin Description</label>
                <textarea class="form-control" name="cabin-description" id="cabin-description" rows="3"><?php echo $cabin["descriptions"]; ?></textarea>
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