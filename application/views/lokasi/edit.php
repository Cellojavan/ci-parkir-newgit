
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
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  name="namelokasi" value="<?= $lokasi['nama_lokasi']?>" placeholder="Enter Name" autocomplete="off">
            <input type="hidden" name="id" value="<?= $lokasi['id_lokasi']?>">
            <small class="form-text text-danger"><?= form_error('namelokasi'); ?></small>
        </div>
        <button class="btn btn-success" type="submit">UBAH</button>
        <button class="btn btn-warning" type="reset">RESET</button>
        <a href="<?= base_url() ?>lokasi" class="btn btn-danger">BACK</a>   
    </form>
    </div>
    </div>
        </div>
    </div>
</div>
s