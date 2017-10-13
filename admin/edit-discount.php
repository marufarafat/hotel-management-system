<?php
$headerStyle = array();
$footerScript = array();
$siteTitle = "Edit discounts"; 
include_once 'partials/header.php'; 

$discountid = null;

if (isset($_GET["editdiscountid"])) {
    $discountid = (int) $_GET["editdiscountid"];
}
if (isset($_GET["id"])) {
    $discountid = $_GET["id"];
}
$discount = \Hotel\Models\Discount::find($discountid);

if (empty($discount)) {
    header("location: discounts.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["update_discount"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("update_discount")){
    
    $v = new Valitron\Validator($_GET);
    $v->rule('required', array("id", "discount_name", "parcent", "discount_code"));

    // checking if have error
    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {

        $discount->name = $_GET["discount_name"];
        $discount->parcent = $_GET["parcent"];
        $discount->code = $_GET["discount_code"];
        $discount->start_date = $_GET["start_date"];
        $discount->end_date = $_GET["end_date"];

        if ($discount->save()) {
            header("location: discounts.php");
        }
    }
}

?>
<div class="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="discounts.php">Discount</a></li>
      <li class="breadcrumb-item active"><?php echo $siteTitle; ?></li>
    </ol>
    <h1><?php echo $siteTitle; ?></h1>
    
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <form action="" method="get">

                <?php $misc->getMessages(); ?>

              <div class="form-group">
                <label for="discount_name">Name of discount</label>
                <input type="text" class="form-control" value="<?php echo $discount->name; ?>" name="discount_name" id="discount_name" placeholder="summer discount">
              </div>
              <div class="form-group">
                <label for="parcent">Parcent of discount</label>
                <input type="text" class="form-control" value="<?php echo $discount->parcent; ?>" name="parcent"  id="parcent" placeholder="50">
              </div>
              <div class="form-group">
                <label for="discount_code">Discount code</label>
                <input type="text" class="form-control" value="<?php echo $discount->code; ?>" name="discount_code"  id="discount_code" placeholder="Flt35lw">
              </div>
              <div class="form-group">
                <label for="start_date">Discount Start date</label>
                <input type="date" value="<?php echo $discount->start_date; ?>" class="form-control" name="start_date"  id="start_date" placeholder="Flt35lw">
              </div>
              <div class="form-group">
                <label for="end_date">Discount End Date</label>
                <input type="date" value="<?php echo $discount->end_date; ?>" class="form-control" name="end_date"  id="end_date" placeholder="Flt35lw">
              </div>
              <div class="form-group">
                <input type="submit" name="update_discount" value="Create discount" class="btn">
              </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("update_discount"); ?>">
            <input type="hidden" name="id" value="<?php echo $discount->id; ?>">
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>