<!DOCTYPE html>
<html lang="en">
<head><?php $this->load->view('layouts/head')?></head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php if($this->session->userdata('role_id') == 3):?>
        <?php $this->load->view('layouts/sidebar/back_office')?>
    <?php elseif($this->session->userdata('role_id') == 2):?>
        <?php $this->load->view('layouts/sidebar/front_desk')?>
    <?php endif;?>
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
            <?php if($this->session->userdata('role_id') == 2):?>
            <div class="text-right">
                <a href="<?php echo site_url('customers/create')?>" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Add Customer</a>
            </div>
            <?php endif;?>
            <div class="card shadow mb-4">
                <div class="card-header py-3 font-weight-bold"><i class="fa fa-id-card"></i> Customer List</div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" ellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fullname</th>
                            <th>Id card Number</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <?php if($this->session->userdata('role_id') == 3):?>
                                <th>Actions</th>
                            <?php endif;?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer):?>
                            <tr>
                                <td><?php echo $customer->id;?></td>
                                <td><?php echo $customer->fullname;?></td>
                                <td><?php echo $customer->idcard_number;?></td>
                                <td><?php echo $customer->phone_number;?></td>
                                <td><?php echo $customer->address;?></td>
                                <td>
                                    <img class="mx-auto d-block" width="64" height="64" src="
                                    <?php 
                                        if($customer->photo == null) echo base_url('assets/img/image-placeholder.png');
                                        else echo base_url('uploads/customers/'.$customer->photo);
                                    ?>">
                                </td>
                                <?php if($this->session->userdata('role_id') == 3):?>
                                <td width="250">
                                    <a href="<?php echo site_url('customers/edit/'.$customer->id) ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('customers/delete/'.$customer->id) ?>')"
                                        href="#!" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                                <?php endif;?>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>


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

  <script>
      function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
      $(document).ready(function() {
        $('#dataTable').DataTable({
            "lengthChange":false,
            "searching":false,
        });
      } );
  </script>

</body>

</html>