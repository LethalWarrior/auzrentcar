<!DOCTYPE html>
<html lang="en">
<head><?php $this->load->view('layouts/head')?></head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('layouts/sidebar/super')?>
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
                <a href="<?php echo site_url('users/create')?>" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Add User</a>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 font-weight-bold"><i class="fa fa-user-alt"></i> User List</div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" ellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user):?>
                            <tr>
                                <td><?php echo $user->id;?></td>
                                <td><?php echo $user->fullname;?></td>
                                <td><?php echo $user->email;?></td>
                                <td><?php echo $user->role_name;?></td>
                                <td width="250">
                                    <a href="<?php echo site_url('users/edit/'.$user->id) ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('users/delete/'.$user->id) ?>')"
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