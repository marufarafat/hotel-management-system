<?php
$headerStyle = array();
$footerScript = array();
$siteTitle = "Create discounts"; 
include_once 'partials/header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["create_discount"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("careate_discount")){
    
    $v = new Valitron\Validator($_GET);
    $v->rule('required', array("discount_name", "parcent", "discount_code"));

    // checking if have error
    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {
        $discount = \Hotel\Models\Discount::create(array(
            'name'      => $_GET["discount_name"], 
            'parcent'   => $_GET["parcent"], 
            'code'      => $_GET["discount_code"],
            'start_date'=> $_GET["start_date"],
            'end_date'  => $_GET["end_date"]
        ));
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

                <?php 
                echo "<pre>";
                var_dump($misc->getMessages());
                echo "</pre>";
                 ?>

              <div class="form-group">
                <label for="discount_name">Name of discount</label>
                <input type="text" class="form-control" name="discount_name" id="discount_name" placeholder="summer discount">
              </div>
              <div class="form-group">
                <label for="parcent">Parcent of discount</label>
                <input type="text" class="form-control" name="parcent"  id="parcent" placeholder="50">
              </div>
              <div class="form-group">
                <label for="discount_code">Discount code</label>
                <input type="text" class="form-control" name="discount_code"  id="discount_code" placeholder="Flt35lw">
              </div>
              <div class="form-group">
                <label for="start_date">Discount Start date</label>
                <input type="date" class="form-control" name="start_date"  id="start_date" placeholder="Flt35lw">
              </div>
              <div class="form-group">
                <label for="end_date">Discount End Date</label>
                <input type="date" class="form-control" name="end_date"  id="end_date" placeholder="Flt35lw">
              </div>
              <div class="form-group">
                <input type="submit" name="create_discount" value="Create discount" class="btn">
              </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("careate_discount"); ?>">
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>