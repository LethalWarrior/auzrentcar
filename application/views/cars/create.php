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
            
            <form class="card shadow mb-4" action="<?php echo site_url('cars/store')?>" enctype="multipart/form-data" method="POST">
                <div class="card-header py-3 font-weight-bold">
                    <i class="fa fa-car-alt"></i> Create Car
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?php echo base_url('assets/img/image-placeholder.png')?>" class="mx-auto d-block" style="width:350;height:350"><br><br>
                            <div class="custom-file">
                                <label class="custom-file-label" for="inputfile">Photo</label>
                                <input type="file" name="photo" class="custom-file-input" id="inputfile">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="inputbrand">Brand</label>
                                <input type="hidden" name="id" value="<?php $new = ((int)$last_car->id) + 1; echo $new;?>" />
                                <input type="text" name="brand" class="form-control" id="inputbrand" placeholder="Enter Car's brand">
                            </div>
                            <div class="form-group">
                                <label for="inputmodel">Model</label>
                                <input type="text" name="model" class="form-control" id="inputmodel" placeholder="Enter Car's model">
                            </div>
                            <div class="form-group">
                                <label for="inputcolor">Color</label>
                                <input type="text" name="color" class="form-control" id="inputcolor" placeholder="Enter Car's color">
                            </div>
                            <div class="form-group">
                                <label for="inputlicense">License Plate Number</label>
                                <input type="text" name="license_plate" class="form-control" id="inputlicense" placeholder="Enter Car's License Plate Number">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mb-2"><i class="fa fa-plus"></i> Add Car</button>
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