
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card">
    <div class="card-header">
        Form Tambah Data Lokasi
    </div>
    <div class="card-body">

       <form action="" method="post">
       <div class="form-group">
            <label for="name">Name Lokasi</label>
            <input type="text" class="form-control" id="name"  name="namelokasi" placeholder="Enter Name Location" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('namelokasi'); ?></small>
        </div>
        <button class="btn btn-primary" type="submit">TAMBAH</button>
        <button class="btn btn-warning" type="reset">RESET</button>
        <a href="<?= base_url() ?>lokasi" class="btn btn-danger">BACK</a>   
    </form>
    </div>
    </div>
        </div>
    </div>
</div>
