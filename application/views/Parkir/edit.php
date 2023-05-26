
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
                <h5 class="m-0">Edit Parkir</h5>
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
                <?php if($this->session->flashdata('cek')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Username sudah <strong><?= $this->session->flashdata('cek');?></strong> 
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
                        <label for="lokasiid">Petugas </label>
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
                        <label for="lokasiid">Lokasi </label>
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
                        <label for="lokasiid">Kendaraan </label>
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

