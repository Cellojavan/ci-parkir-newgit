
<div class="wrapper">

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
      <img src="<?= base_url()?>/dist/img/2526586_transportation_vehicle_icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Parkir</span>
    </a>

    <!-- Sidebar -->
       <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()?>/dist/img/352174_user_icon.png" class="img-circle elevation-2" alt="User Image">
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
              <form action="" method="post">
                <div class="form-group">
                        <label for="tglin">Tgl In</label>
                        <input type="date" class="form-control" id="tglin"  name="tglin"  value="<?= $parkir['tgl_in']?>" placeholder="Enter Tgl In" autocomplete="off">
                        <input type="hidden" name="id" value="<?= $parkir['id_parkir']?>">
                        <small class="form-text text-danger"><?= form_error('tglin'); ?></small>
                    </div>
                <div class="form-group">
                        <label for="tglout">Tgl Out</label>
                        <input type="date" class="form-control" id="tglout"  name="tglout" value="<?= $parkir['tgl_out']?>" placeholder="Enter Tgl Out" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('tglout'); ?></small>
                    </div>
                  
                    <div class="form-group">
                        <label for="lokasiid">Petugas ID</label>
                        <select class="form-control" name="petugasid" id="lokasiid">
                          <?php foreach($petugas as $ptgs) :?>
                            <?php if($ptgs['id_petugas'] == $parkir['petugas_id']) : ?>
                              <option value="<?=$ptgs['id_petugas']?>"selected><?= $ptgs['nama_petugas'] ?></option>
                            <?php else :?>
                              <option value="<?=$ptgs['id_petugas']?>"><?= $ptgs['nama_petugas'] ?></option>
                            <?php endif ?>  
                          <?php endforeach ?> 
                        </select>
                        <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasiid">Lokasi ID</label>
                        <select class="form-control" name="lokasiid" id="lokasiid">
                          <?php foreach($lokasi as $lks) :?>
                            <?php if($lks['id_lokasi'] == $parkir['lokasi_id']) : ?>
                              <option value="<?=$lks['id_lokasi']?>"selected><?= $lks['nama_lokasi'] ?></option>
                            <?php else :?>
                              <option value="<?=$lks['id_lokasi']?>"><?= $lks['nama_lokasi'] ?></option>
                            <?php endif ?>  
                          <?php endforeach ?> 
                        </select>
                        <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasiid">Kendaraan ID</label>
                        <small  class="form-text text-muted">1 : Sepeda</small>
                        <small  class="form-text text-muted">2 : Mobil</small>
                        <select class="form-control" name="jeniskendaraanid" id="lokasiid">
                          <?php foreach($kendaraan as $kndr) :?>
                            <option value="<?=$kndr['id_jenis_kendaraan']?>"><?= $kndr['jenis_kendaraan'] ?></option>
                          <?php endforeach ?> 
                        </select>
                        <small class="form-text text-danger"><?= form_error('jeniskendaraanid'); ?></small>
                    </div>
                <div class="form-group">
                        <label for="nopolkendaraan">Nopol Kendaraans</label>
                        <input type="text" class="form-control" id="nopolkendaraan"  name="nopolkendaraan" value="<?= $parkir['nopol_kendaraan']?>" placeholder="Enter NopolKendaraanss" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('nopolkendaraan'); ?></small>
                    </div>
                <div class="form-group">
                        <label for="tarif">Tarif</label>
                        <input type="text" class="form-control" id="tarif"  name="tarif" value="<?= $parkir['tarif']?>" placeholder="Enter Tarif" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('arif'); ?></small>
                    </div>
                    <button class="btn btn-primary" type="submit">UBAH</button>
                    <button class="btn btn-warning" type="reset">RESET</button>
                    <a href="<?= base_url('parkir') ?>" class="btn btn-danger">BACK</a>   
                </form>
                
      
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

