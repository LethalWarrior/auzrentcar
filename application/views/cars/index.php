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
                <a href="<?php echo site_url('cars/create')?>" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Add Car</a>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 font-weight-bold"><i class="fa fa-car-side"></i> Car List</div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" ellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Color</th>
                            <th>Photo</th>
                            <th>License Plate Number</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cars as $car):?>
                            <tr>
                                <td><?php echo $car->id;?></td>
                                <td><?php echo $car->brand;?></td>
                                <td><?php echo $car->model;?></td>
                                <td><?php echo $car->color;?></td>
                                <td>
                                    <img class="mx-auto d-block" width="64" height="64" src="
                                    <?php 
                                        if($car->photo == null) echo base_url('assets/img/image-placeholder.png');
                                        else echo base_url('uploads/cars/'.$car->photo);
                                    ?>">
                                </td>
                                <td><?php echo $car->license_plate;?></td>
                                <td>
                                    <?php if($car->availability == 1):?>
                                    <div class="text-center">
                                        <i class="fa fa-check-circle text-success text-center fa-2x"></i>
                                    </div>
                                    <?php else: ?>
                                    <div class="text-center">
                                        <i class="fa fa-times-circle text-danger text-center fa-2x"></i>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td width="250">
                                    <a href="<?php echo site_url('cars/edit/'.$car->id) ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('cars/delete/'.$car->id) ?>')"
                                        href="#!" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                </td>
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