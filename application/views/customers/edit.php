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
            
            <form class="card shadow mb-4" action="<?php echo site_url('customers/update')?>" enctype="multipart/form-data" method="POST">
                <div class="card-header py-3 font-weight-bold">
                    <i class="fa fa-customer-alt"></i> Edit Customer
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col form-group">
                            <label for="inputfullname">Full Name</label>
                            <input type="hidden" name="id" value="<?php echo $customer->id?>" />
                            <input type="text" name="fullname" class="form-control" id="inputfullname" placeholder="Enter Customer's fullname" value="<?php echo $customer->fullname?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="inputidcard">ID Card Number</label>
                            <input type="text" name="idcard_number" class="form-control" id="inputidcard" placeholder="Enter Customer's ID Card Number" value="<?php echo $customer->idcard_number?>">
                        </div>
                        <div class="col form-group">
                            <label for="inputphone">Phone Number</label>
                            <input type="tel" name="phone_number" class="form-control" id="inputphone" placeholder="Enter Customer's phone" value="<?php echo $customer->phone_number?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="inputaddress">Address</label>
                            <textarea name="address" class="form-control" id="inputaddress" rows="3" placeholder="Enter Customer's Address"><?php echo $customer->address ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mb-2"> Edit Customer</button>
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