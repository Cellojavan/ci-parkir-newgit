
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card">
    <div class="card-header">
        Form Tambah Data Parkir
    </div>
    <div class="card-body">

       <form action="" method="post">
       <div class="form-group">
            <label for="tglin">Tgl In</label>
            <input type="date" class="form-control" id="tglin"  name="tglin" value="<?= $parkir['tgl_in']?>" placeholder="Enter Tgl In" autocomplete="off">
            <input type="hidden" name="id" value="<?= $parkir['id_parkir']?>">
            <small class="form-text text-danger"><?= form_error('tglin'); ?></small>
        </div>
       <div class="form-group">
            <label for="tglout">Tgl Out</label>
            <input type="date" class="form-control" id="tglout"  name="tglout" value="<?= $parkir['tgl_out']?>" placeholder="Enter Tgl Out" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('tglout'); ?></small>
        </div>
       <div class="form-group">
            <label for="petugasid">Petugas Id</label>
            <input type="text" class="form-control" id="petugasid"  name="petugasid"  value="<?= $parkir['petugas_id']?>" placeholder="Enter Petugas Id" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('petugasid'); ?></small>
        </div>
       <div class="form-group">
            <label for="lokasiid">Lokasi Id</label>
            <input type="text" class="form-control" id="lokasiid"  name="lokasiid"  value="<?= $parkir['lokasi_id']?>" placeholder="Enter Lokasi Id" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
        </div>
       <div class="form-group">
            <label for="jeniskendarannid">Kendaraan Id</label>
            <input type="text" class="form-control" id="jeniskendarannid"  name="jeniskendaraanid"  value="<?= $parkir['jenis_kendaraan_id']?>" placeholder="Enter Kendarann Id" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('jeniskendarannid'); ?></small>
        </div>
       <div class="form-group">
            <label for="nopolkendaraan">Nopol Kendaraans</label>
            <input type="text" class="form-control" id="nopolkendaraan"  name="nopolkendaraan"  value="<?= $parkir['nopol_kendaraan']?>" placeholder="Enter NopolKendaraanss" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('nopolkendaraan'); ?></small>
        </div>
       <div class="form-group">
            <label for="tarif">Tarif</label>
            <input type="text" class="form-control" id="tarif"  name="tarif" value="<?= $parkir['tarif']?>"  placeholder="Enter Tarif" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('arif'); ?></small>
        </div>
        <button class="btn btn-success" type="submit">UBAH</button>
        <button class="btn btn-warning" type="reset">RESET</button>
        <a href="<?= base_url('parkir') ?>" class="btn btn-danger">BACK</a>   
    </form>
    </div>
    </div>
        </div>
    </div>
</div>

</div>
s