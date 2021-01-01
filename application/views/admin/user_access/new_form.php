<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
            <div>
                <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/user-akses'">Kembali</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <center><?= validation_errors() ?></center>
        <center><?= $this->session->flashdata('error_file') ?: "" ?></center>
        <center><?= $this->session->flashdata('error_insert') ?: "" ?></center>
        <form action="<?= base_url('admin/user-akses/add') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
        </form>
    </div>
</div>