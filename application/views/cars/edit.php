<!DOCTYPE html>
<html lang="en">
<head><?php $this->load->view('layouts/head')?></head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('layouts/sidebar/back_office')?>
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Top bar -->
        <?php $this->load->view('layouts/navbar')?>
        <!-- End of Top bar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="text-right">
                <a href="<?php echo site_url('cars')?>" class="btn btn-primary mb-2"><i class="fa fa-car-side"></i> View Car List</a>
            </div>
            
            <form class="card shadow mb-4" action="<?php echo site_url('cars/update')?>" method="POST">
                <div class="card-header py-3 font-weight-bold">
                    <i class="fa fa-car-alt"></i> Edit Car
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="inputbrand">Brand</label>
                            <input type="hidden" name="id" value="<?php echo $car->id?>" />
                            <input type="hidden" name="availability" value="<?php echo $car->availability?>" />
                            <input type="text" name="brand" class="form-control" id="inputbrand" placeholder="Enter Car's brand" value="<?php echo $car->brand ?>">
                        </div>
                        <div class="form-group col">
                            <label for="inputmodel">Model</label>
                            <input type="text" name="model" class="form-control" id="inputmodel" placeholder="Enter Car's model" value="<?php echo $car->model ?>">
                        </div>
                        <div class="form-group col">
                            <label for="inputcolor">Color</label>
                            <input type="text" name="color" class="form-control" id="inputcolor" placeholder="Enter Car's color" value="<?php echo $car->color ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="inputlicense">License Plate Number</label>
                            <input type="text" name="license_plate" class="form-control" id="inputlicense" placeholder="Enter Car's License Plate Number" value="<?php echo $car->license_plate ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mb-2">Edit Car</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('layouts/footer.php')?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <?php $this->load->view('layouts/scrolltop')?>
  <?php $this->load->view('layouts/modal')?>

  <!-- Javascripts -->
  <?php $this->load->view('layouts/scripts')?>

</body>

</html>