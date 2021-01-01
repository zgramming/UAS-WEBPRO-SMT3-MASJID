  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Ustadz</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/ustadz'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <center><?= $this->session->flashdata('error_file') ?: "" ?></center>
          <form action="<?= base_url('admin/ustadz/add') ?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="Anggit / Akhyar / dll... " name="name" value="">
              </div>

              <div class="form-group">
                  <label for="name">Tanggal Lahir</label>
                  <input type="text" class="form-control input-sm datepicker" id="birth_date" name="birth_date" value="">
              </div>

              <div class="form-group">
                  <label for="image">Gambar</label>
                  <input type="file" class="form-control" id="image" name="image">
              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>