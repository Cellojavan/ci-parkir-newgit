
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card">
    <div class="card-header">
        Form Ubah Data Lokasi
    </div>
    <div class="card-body">

       <form action="" method="post">
       <div class="form-group">
            <label for="name">Lokasi Id</label>
            <input type="text" class="form-control" id="name"  name="lokasiid" value="<?= $petugas['lokasi_id']?>" placeholder="Enter Name" autocomplete="off">
            <input type="hidden" name="id" value="<?= $petugas['id_petugas']?>">
            <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
        </div>
       <div class="form-group">
            <label for="name">Name Petugas</label>
            <input type="text" class="form-control" id="name"  name="namapetugas" value="<?= $petugas['nama_petugas']?>" placeholder="Enter Name" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('namapetugas'); ?></small>
        </div>
        <button class="btn btn-success" type="submit">UBAH</button>
        <button class="btn btn-warning" type="reset">RESET</button>
        <a href="<?= base_url() ?>petugas" class="btn btn-danger">BACK</a>   
    </form>
    </div>
    </div>
        </div>
    </div>
</div>
s