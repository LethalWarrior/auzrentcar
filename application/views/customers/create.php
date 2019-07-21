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
                <a href="<?php echo site_url('customers')?>" class="btn btn-primary mb-2"><i class="fa fa-id-card"></i> View Customer List</a>
            </div>
            
            <form class="card shadow mb-4" action="<?php echo site_url('customers/store')?>" enctype="multipart/form-data" method="POST">
                <div class="card-header py-3 font-weight-bold">
                    <i class="fa fa-customer-alt"></i> Create Customer
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
                                <label for="inputfullname">Full Name</label>
                                <input type="hidden" name="id" value="<?php 
                                    if($last_customer == null) echo 1; else {
                                    $new = ((int)$last_customer->id) + 1; echo $new;}
                                ?>" />
                                <input type="text" name="fullname" class="form-control" id="inputfullname" placeholder="Enter Customer's fullname">
                            </div>
                            <div class="form-group">
                                <label for="inputidcard">ID Card Number</label>
                                <input type="text" name="idcard_number" class="form-control" id="inputidcard" placeholder="Enter Customer's ID Card Number">
                            </div>
                            <div class="form-group">
                                <label for="inputphone">Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control" id="inputphone" placeholder="Enter Customer's phone">
                            </div>
                            <div class="form-group">
                                <label for="inputaddress">Address</label>
                                <textarea name="address" class="form-control" id="inputaddress" rows="3" placeholder="Enter Customer's Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mb-2"><i class="fa fa-plus"></i> Add Customer</button>
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