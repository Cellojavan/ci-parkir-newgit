<div class="wrapper">
  <?php
  
  ?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/2526586_transportation_vehicle_icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Parkir</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/352174_user_icon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php if($this->session->userdata("hak_akses") == "admin") {?>
          <a href="#" class="d-block">Admin</a>
          <?php } ?>
          <?php if($this->session->userdata("hak_akses") == "petugas") {?>
          <a href="#" class="d-block">Petugas</a>
          <?php } ?>
          <?php if($this->session->userdata("hak_akses") == "manager") {?>
          <a href="#" class="d-block">Manager</a>
          <?php } ?>
        </div>
      </div>
    


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <?php if($this->session->userdata("hak_akses") == "admin") { ?>
                <li class="nav-item">
                    <a href="<?= base_url()?>lokasi" class="nav-link">
                    <i class="fas fa-map-marker-alt">&nbsp&nbsp</i>
                    <p>
                        Lokasi
                    </p>
                    </a>       
                </li>
               <li class="nav-item">
                    <a href="<?= base_url()?>kendaraan" class="nav-link">
                    <i class="fas fa-car">&nbsp</i>    
                    <p>
                        Jenis Kendaraan
                    </p>
                    </a>       
                </li>
               <li class="nav-item">
                    <a href="<?= base_url()?>parkir" class="nav-link">
                    <i class="fas fa-parking">&nbsp&nbsp</i>
                    <p>
                        Parkir
                    </p>
                    </a>       
                </li>
               <li class="nav-item">
                    <a href="<?= base_url()?>petugas" class="nav-link">
                    <i class="fas fa-user-cog">&nbsp</i>
                    <p>
                        Petugas
                    </p>
                    </a>       
                </li>
               <li class="nav-item">
                    <a href="<?= base_url()?>lokasi" class="nav-link">
                    <i class="fas fa-users">&nbsp</i>
                    <p>
                        User
                    </p>
                    </a>       
                </li>
              <?php } ?>
              <?php if($this->session->userdata("hak_akses") == "manager") { ?>
               <li class="nav-item">
                    <a href="<?= base_url()?>kendaraan" class="nav-link">
                    <i class="fas fa-car">&nbsp</i>    
                    <p>
                        Jenis Kendaraan
                    </p>
                    </a>       
                </li>
               <li class="nav-item">
                    <a href="<?= base_url()?>parkir" class="nav-link">
                    <i class="fas fa-parking">&nbsp&nbsp</i>
                    <p>
                        Parkir
                    </p>
                    </a>       
                </li>
               <li class="nav-item">
                    <a href="<?= base_url()?>petugas" class="nav-link">
                    <i class="fas fa-user-cog">&nbsp</i>
                    <p>
                        Petugas
                    </p>
                    </a>       
                </li>
              <?php } ?>
              <?php if($this->session->userdata("hak_akses") == "petugas") { ?>
                <li class="nav-item">
                    <a href="<?= base_url()?>parkir" class="nav-link">
                    <i class="fas fa-parking">&nbsp&nbsp</i>
                    <p>
                        Parkir
                    </p>
                    </a>       
                </li>
              <?php } ?>
               
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Data User</h5>
              </div>
              <div class="card-body">
                <?php if($this->session->flashdata('flash')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data berhasil <strong><?= $this->session->flashdata('flash');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('login')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('login');?>&nbsp<strong><?= $nama['nama_user']?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
              <a href="<?= base_url('')?>user/tambah" class="btn btn-primary mb-3 ">Tambah User</a>
              <a href="<?= base_url('')?>login/logout" class="btn btn-danger mb-3 float-right ">Logout</a>

              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">NoHp</th>
                        <th scope="col">HakAkses</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach($user as $us) : ?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $us['nama_user'] ?></td>
                        <td><?= $us['username'] ?></td>
                        <td><?= $us['password'] ?></td>
                        <td><?= $us['email'] ?></td>
                        <td><?= $us['no_wa'] ?></td>
                        <td><?= $us['hak_akses'] ?></td>
                        <td>
                            <a href="<?= base_url()?>user/edit/<?= $us['id_user']?>" class="btn btn-warning">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $us['id_user']?>">
                              Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?= $us['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda ingin menghapus data <?= $us['nama_user']?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url()?>user/hapus/<?= $us['id_user']?>" class="btn btn-danger">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

               
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
