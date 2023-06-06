
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a href="<?= base_url('')?>login/logout" class="btn btn-danger  float-right ">Logout</a>
              </li>
            </ul>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
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
                <h5 class="m-0">Data Petugas</h5>
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
                <?php if($this->session->flashdata('flashh')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Kendaraan Berhasil <strong><?= $this->session->flashdata('flashh');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('error')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong><?= $this->session->flashdata('error');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('login')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('login');?>&nbsp<strong><?= $this->session->userdata('hak_akses');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>

                <div class="row">
                  <div class="col-md-5">
                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search" autocomplete="off">
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-primary"  name="submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <form action="" method="post">
                    <div class="row g-3 align-items-center">
                    
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" >
                    </div>
                    -
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" >
                    </div>
                    
                    <div class="col-auto">
                    <input type="submit" value="cari" class="btn btn-primary" name="cari">
                    </div>
                    </div>
                    </form>
                  
                  </div>
                </div>
                <?php if($this->session->userdata("hak_akses") == "admin") {?>
                </br>
                <?php } ?>
                <?php if($this->session->userdata("hak_akses") == "petugas") {?>
                  <a href="<?= base_url('')?>P_parkir/tambah" class="btn btn-primary mb-3 mt-2">Masuk</a>
                <?php } ?>
                <?php if($this->session->userdata("hak_akses") == "manager") {?>
                  </br>
                <?php } ?>
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal In</th>
                        <th scope="col">Foto in</th>
                        <th scope="col">Tanggal Out</th>
                        <th scope="col">Foto Out</th>
                        <th scope="col">Nopol</th>
                        <th scope="col">lokasi</th>
                        <th scope="col">Kendaraan</th>
                        <th scope="col">Tarif</th>
                        <th scope="col">Status</th>
                        <?php if($this->session->userdata("hak_akses") == "admin") {?>
                  
                        <?php } ?>
                        <?php if($this->session->userdata("hak_akses") == "petugas") {?>
                          <th scope="col">Aksi</th>
                        <?php } ?>
                        <?php if($this->session->userdata("hak_akses") == "manager") {?>
        
                        <?php } ?>

                    </tr>
                </thead>
                
                <tbody>
                <?php if(empty($parkir)): ?>
                
                <div class="alert alert-danger" role="alert">
                    Data not found!
                </div>
               
                <?php endif ;?>
                    <?php $i = 1;?>
                    <?php foreach($parkir as $pkr) : ?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $pkr['tgl_in'] ?></td>
                        <td><img src="<?= base_url().'/dist/img/fotomasuk/'.$pkr['foto_in']?>" width="150" ></td>
                        <td><?= $pkr['tgl_out'] ?></td>
                        <td><img src="<?= base_url().'/dist/img/fotoout/'.$pkr['foto_out']?>" width="150" ></td>
                        <td><?= $pkr['nopol'] ?></td>
                        <td><?= $pkr['nama_lokasi'] ?></td>
                        <td><?= $pkr['jenis_kendaraan'] ?></td>
                       
                        <td><?= $pkr['tarif_parkir']?></td>
                        <td>
                          <?php if($pkr['status'] == 'Done') {?>
                            <small class="form-text text-success"><?= $pkr['status'] ?></small>
                          <?php }else{?>  
                            <small class="form-text text-danger"><?= $pkr['status'] ?></small>
                          <?php }?>   
                        </td>
                      
                        <?php if($this->session->userdata("hak_akses") == "admin") {?>
                  
                        <?php } ?>
                        <?php if($this->session->userdata("hak_akses") == "petugas") {?>
                          <td>
                            <a href="<?= base_url()?>P_parkir/keluar/<?= $pkr['id_pengelolaan_parkir']?>" class="btn btn-warning">Keluar</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $pkr['id_pengelolaan_parkir']?>">
                              Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?= $pkr['id_pengelolaan_parkir']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda ingin menghapus data <?= $pkr['nopol']?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url()?>P_parkir/hapus/<?= $pkr['id_pengelolaan_parkir']?>" class="btn btn-danger">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>                        
                        <?php } ?>
                        <?php if($this->session->userdata("hak_akses") == "manager") {?>
                  
                        <?php } ?>

                          
                       
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
