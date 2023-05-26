
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
          </div><!-- /.col -->
          <div class="col-sm-6">
          <a href="<?= base_url('')?>login/logout" class="btn btn-danger mb-3 float-right ">Logout</a>

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
                <h5 class="m-0">Data Parkir</h5>
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
                <?php if($this->session->flashdata('error')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Data berhasil <strong><?= $this->session->flashdata('error');?></strong> 
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
              <a href="<?= base_url('')?>parkir/tambah" class="btn btn-primary mb-3 ">Tambah Parkir</a>
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tgl In</th>
                        <th scope="col">Tgl Out</th>
                        <th scope="col">Petugas </th>
                        <th scope="col">Lokasi </th>
                        <th scope="col">Kendaraan </th>
                        <th scope="col">Nopol</th>
                        <th scope="col">Tarif</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php 
                    
                    function rupiah($angka){

                        $hasil = "Rp " . number_format($angka, '2', ',', '.');
                        return $hasil;
                    }
                    
                    ?>
                    <?php foreach($parkir as $pk) : ?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $pk['tgl_in'] ?></td>
                        <td><?= $pk['tgl_out'] ?></td>
                        <td><?= $pk['nama_petugas'] ?></td>
                        <td><?= $pk['nama_lokasi'] ?></td>
                        <td><?= $pk['jenis_kendaraan'] ?></td>
                        <td><?= $pk['nopol_kendaraan'] ?></td>
                        <td><?= rupiah($pk['tarif']) ?></td>
                        <td>
                            <a href="<?= base_url()?>parkir/edit/<?= $pk['id_parkir']?>" class="btn btn-warning">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#hapus<?= $pk['id_parkir']?>">
                              Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?= $pk['id_parkir']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda ingin menghapus data <?= $pk['nopol_kendaraan']?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url()?>parkir/hapus/<?= $pk['id_parkir']?>" class="btn btn-danger">Hapus</a>
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
