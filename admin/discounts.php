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
$siteTitle = "Discounts"; 
include_once 'partials/header.php'; 

$discounts = \Hotel\Models\Discount::where("end_date", ">", date('Y-m-d'))->get()->toArray();
if (isset($_GET["deletediscountid"])) {
    \Hotel\Models\Discount::destroy((int) $_GET["deletediscountid"]);
    header("location: discounts.php");
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
            <a href="create-dicount.php" class="btn btn-lg">Create Discount</a>
        </div>        
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- data table -->
        <?php if (!empty($discounts)) {?>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Parcent</th>
                      <th>Code</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Parcent</th>
                      <th>Code</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($discounts as $discount) { 
                        ?>

                    <tr>
                      <td><?php echo $discount["name"]; ?></td>
                      <td>$ <?php echo $discount["parcent"]; ?></td>
                      <td><?php echo $discount["code"]; ?></td>
                      <td><?php echo $discount["start_date"]; ?></td>
                      <td><?php echo $discount["end_date"]; ?></td>
                      <td>
                        <a href="edit-discount.php?editdiscountid=<?php echo $discount["id"]; ?>">Edit</a> | 
                        <a href="discounts.php?deletediscountid=<?php echo $discount["id"]; ?>"  data-confirm="Are you sure. you want to delete this item?">Delete</a> 
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php } else{
            echo "no discount found";
        } ?>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<?php include_once 'partials/footer.php'; ?>