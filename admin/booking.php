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
$siteTitle = "Booking"; 
include_once 'partials/header.php'; 

$books = \Hotel\Models\Booking::get()->toArray();

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
    
    <!-- data table -->
    <?php if (!empty($books)) {?>
        
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
                  <th>Cabin name</th>
                  <th>Username</th>
                  <th>Arrival Date</th>
                  <th>Departure Date</th>
                  <th>Cabin Type name</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Cabin name</th>
                  <th>Username</th>
                  <th>Arrival Date</th>
                  <th>Departure Date</th>
                  <th>Cabin Type name</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($books as $book) { 
                    $user = \Hotel\Models\Users::find($book["user"]);
                    $cabin = \Hotel\Models\Cabin::find($book["cabinid"]);
                    $cabinType = \Hotel\Models\CabinType::find($cabin["type"]);
                    $toDates = explode(" to ", $book["date"]);
                    ?>

                <tr>
                  <td><?php echo $cabin->name; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo current($toDates); ?></td>
                  <td><?php echo end($toDates); ?></td>
                  <td><?php echo $cabinType["name"]; ?></td>
                  <td><?php echo $book["totalPrice"]; ?></td>
                  <td>
                    <a href="edit-book.php?bookid=<?php echo $book["id"]; ?>">Edit</a>
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