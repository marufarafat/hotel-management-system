<?php
$headerStyle = array(
  "vendor/datatables/dataTables.bootstrap4.css"
  );
$footerScript = array(
  "vendor/popper/popper.min.js",
  "vendor/jquery-easing/jquery.easing.min.js",
  "vendor/chart.js/Chart.min.js",
  "vendor/datatables/jquery.dataTables.js",
  "vendor/datatables/dataTables.bootstrap4.js"
  );
$siteTitle = "Cabins Type"; 
include_once 'partials/header.php'; 

// read cabin type
$cabinTypes = \Hotel\Models\CabinType::get()->toArray();

// get cabin id by form
if (isset($_GET["cabinTypeId"])) {
    $cabinTypeId = (int) $_GET["cabinTypeId"];
}

// get cabin id by url
if (isset($_GET["editcabintypeid"])) {
    $cabinTypeId = (int) $_GET["editcabintypeid"];
}

// check cabintypeid set or not 
if (isset($cabinTypeId)) {
    $editCabinType = \Hotel\Models\CabinType::find($cabinTypeId);
}

// cabin type update
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cabinType"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("cabinType")  && isset($_GET["cabinTypeId"])){

    $v = new Valitron\Validator($_GET);
    $v->rule('required', array("cabinTypeName"));

    // checking if have error
    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {
        $editCabinType->name = $_GET["cabinTypeName"];
        if ($editCabinType->save()) {
            header("location: cabin-type.php");
        }
    }
}
// create cabin type
elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cabinType"]) && isset($_GET["csrf"]) && $_GET["csrf"] === \Hotel\CSRF::get("cabinType")){

    $v = new Valitron\Validator($_GET);
    $v->rule('required', array("cabinTypeName"));

    // checking if have error
    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } else {
        $cabin = \Hotel\Models\CabinType::create(array(
            'name'      => $_GET["cabinTypeName"]
        ));
        if ($cabin->save()) {
            header("location: cabin-type.php");
        }
    }
}

// delete cabin type
if (isset($_GET["deletecabintypeid"])) {
    \Hotel\Models\CabinType::destroy((int) $_GET["deletecabintypeid"]);
    header("location: cabin-type.php");
}
?>



<div class="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="cabins.php">Cabins</a></li>
      <li class="breadcrumb-item active"><?php echo $siteTitle; ?></li>
    </ol>
    <h1><?php echo $siteTitle; ?></h1>

<br>
    
    <!-- data table -->
        
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <form action="" method="get">

                <?php $misc->getMessages(); ?>

            <div class="form-group">
                <label for="cabinTypeName">Name</label>
                <input type="text" value="<?php if(isset($editCabinType)) echo $editCabinType->name; ?>" class="form-control" name="cabinTypeName" id="cabinTypeName" placeholder="Cabin type name">
            </div>
            <div class="form-group">
                <input type="submit" name="cabinType" value="Cabin type" class="btn">
            </div>
            <input type="hidden" name="cabinTypeId" value="<?php if(isset($editCabinType)) echo $editCabinType->id; ?>">
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("cabinType"); ?>">
        </form>
        
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cabinTypes as $cabin) {  ?>
                <tr>
                  <td><?php echo $cabin["name"]; ?></td>
                  <td>
                    <a href="cabin-type.php?editcabintypeid=<?php echo $cabin["id"]; ?>">Edit</a> | 
                    <a href="cabin-type.php?deletecabintypeid=<?php echo $cabin["id"]; ?>">Delete</a> 
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>