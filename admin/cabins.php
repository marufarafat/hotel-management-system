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
$siteTitle = "Cabins"; 
include_once 'partials/header.php'; 

$cabins = \Hotel\Models\Cabin::get()->toArray();

if (isset($_GET["deletecabinid"])) {
    \Hotel\Models\Cabin::destroy((int) $_GET["deletecabinid"]);
    header("location: cabins.php");
}
?>



<div class="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $siteTitle; ?></li>
    </ol>
    <h1><?php echo $siteTitle; ?></h1>

    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <a href="create-cabin.php">Create Cabin</a>
    </div>
        
    </div>

<br>
    
    <!-- data table -->
    <?php if (!empty($cabins)) {?>
        
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Special offer Start</th>
                  <th>Special offer end</th>
                  <th>Special price</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Special offer Start</th>
                  <th>Special offer end</th>
                  <th>Special price</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cabins as $cabin) { 
                    $cabinType = \Hotel\Models\CabinType::find($cabin["type"]);
                    ?>

                <tr>
                  <td><?php echo $cabin["name"]; ?></td>
                  <td><?php echo $cabinType["name"]; ?></td>
                  <td><?php echo $cabin["so_start_date"]; ?></td>
                  <td><?php echo $cabin["so_end_date"]; ?></td>
                  <td><?php echo $cabin["so_price"]; ?></td>
                  <td><?php echo $cabin["price"]; ?></td>
                  <td>
                    <a href="edit-cabin.php?editcabinid=<?php echo $cabin["id"]; ?>">Edit</a> | 
                    <a href="cabins.php?deletecabinid=<?php echo $cabin["id"]; ?>">Delete</a> 
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

    <?php } ?>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>