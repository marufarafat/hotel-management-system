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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cabin"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("careate-cabin")){

    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("cabin-name", "min-adult", "min-child", "cabin-price", "cabin-type", "cabin-description"));

    //upload image to upload folder
    $cpic = $misc->imageProcess($_FILES['cabin_picture'], "uploads/cabins", 1500, 400);

    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    }elseif(!$cpic){
        $misc->setMessages("Please select Cabin picture.");

    } else {
        $cabin = \Hotel\Models\Cabin::create(array(
            'name'          => $_POST["cabin-name"], 
            'cabin_img'     => $cpic,
            'min_adult'     => $_POST["min-adult"], 
            'min_child'     => $_POST["min-child"], 
            'price'         => $_POST["cabin-price"],
            'type'          => $_POST["cabin-type"], 
            'descriptions'  => $_POST["cabin-description"]
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
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
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
                <input type="text" class="form-control" name="cabin-name" id="cabin-name">
              </div>
              <div class="form-group">
                <label for="min-adult">Min Adult</label>
                <select class="form-control" name="min-adult" id="min-adult">
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <label for="min-child">Min Child</label>
                <select class="form-control" name="min-child" id="min-child">
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <label for="cabin-price">Cabin Price</label>
                <input type="text" class="form-control" name="cabin-price"  id="cabin-price">
              </div>
              <div class="form-group">
                <label for="cabin-price">Cabin Picture</label>
                    <input name="cabin_picture" type="file" />
              </div>
              <div class="form-group">
                <label for="cabin-type">Cabin Type</label>
                <select class="form-control" name="cabin-type" id="cabin-type">
                  <option value="1">Luxury</option>
                  <option value="2">Contemporary</option>
                  <option value="3">Original</option>
                </select>
              </div>
              <div class="form-group">
                <label for="cabin-description">Cabin Description</label>
                <textarea class="form-control" name="cabin-description" id="cabin-description" rows="3"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="cabin" value="Cabin" class="btn">
              </div>
            <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("careate-cabin"); ?>">
            </form>
        </div>
    </div>
    
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
                  <th>Min Adult</th>
                  <th>Min Child</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Min Adult</th>
                  <th>Min Child</th>
                  <th>Type</th>
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
                  <td><?php echo $cabin["min_adult"]; ?></td>
                  <td><?php echo $cabin["min_child"]; ?></td>
                  <td><?php echo $cabinType["name"]; ?></td>
                  <td><?php echo $cabin["price"]; ?></td>
                  <td>
                    <a href="cagin.php?editcabinid= <?php echo $cabin["id"]; ?>">Edit</a> | 
                    <a href="cagin.php?deletecabinid= <?php echo $cabin["id"]; ?>">Delete</a> 
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