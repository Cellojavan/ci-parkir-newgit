
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card">
    <div class="card-header">
        Form Tambah Data User
    </div>
    <div class="card-body">

       <form action="" method="post">
       <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('name'); ?></small>
        </div>
       <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username"  name="username" placeholder="Enter Username" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('username'); ?></small>
        </div>
       <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password"  name="password" placeholder="Enter Password" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('password'); ?></small>
        </div>
       <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email"  name="email" placeholder="Enter Email" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('email'); ?></small>
        </div>
       <div class="form-group">
            <label for="nohp">NoHp</label>
            <input type="text" class="form-control" id="nohp"  name="nohp" placeholder="Enter NoHp" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('nohp'); ?></small>
        </div>
        <div class="form-group">
            <label for="hakakses">HakAkses</label>
            <select class="form-control" id="hakakses" name="hakakses">
            <option></option>
            <option>admin</option>
            <option>manager</option>
            <option>petugas</option>
            </select>
            <small class="form-text text-danger"><?= form_error('hakakses'); ?></small>
        </div>
        <button class="btn btn-primary" type="submit">TAMBAH</button>
        <button class="btn btn-warning" type="reset">RESET</button>
        <a href="<?= base_url() ?>" class="btn btn-danger">BACK</a>   
    </form>
    </div>
    </div>
        </div>
    </div>
</div>
