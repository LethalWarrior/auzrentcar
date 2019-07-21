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
                <a href="<?php echo site_url('users')?>" class="btn btn-primary mb-2"><i class="fa fa-user-alt"></i> View User List</a>
            </div>
            
            <form class="card shadow mb-4" action="<?php echo site_url('users/update')?>" method="POST">
                <div class="card-header py-3 font-weight-bold">
                    <i class="fa fa-user-alt"></i> Edit User
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <input type="hidden" name="id" value="<?php echo $user->id?>" />
                            <label for="inputname">Full Name</label>
                            <input type="text" name="fullname" class="form-control" id="inputname" placeholder="Enter user's fullname" value="<?php echo $user->fullname?>">
                        </div>
                        <div class="form-group col">
                            <label for="selectRole">Role</label>
                            <select class="form-control" id="selectRole" name="role_id">
                                <option>-- Choose Role --</option>
                                <?php
                                
                                foreach ($roles as $role) {
                                    $selected = ($user->role_id == $role->id) ? 'selected' : '';
                                    echo '<option '.$selected.' value="'.$role->id.'">'.$role->role_name.'</option>';
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="inputemail">Email</label>
                            <input type="email" name="email" class="form-control" id="inputemail" placeholder="Enter user's email" value="<?php echo $user->email?>">
                        </div><!-- 
                        <div class="form-group col">
                            <label for="inputpassword">Password</label>
                            <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Enter user's password">
                        </div> -->
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mb-2">Edit User</button>
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