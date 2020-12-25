  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Informasi Masjid</h6>
          </div>
      </div>
      <div class="card-body">
          <center><img src="<?= base_url("upload/admin/mosque/" . $mosque->background_image) ?>" class="img-fluid img-thumbnail mb-5" style="max-height: 50vh;" alt="Responsive image"></center>

          <center><?= validation_errors() ?></center>
          <form action="<?= base_url('admin/updateMosque/' . $mosque->id) ?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= $mosque->name ?>">
              </div>

              <div class="form-group">
                  <label for="address">Alamat</label>
                  <textarea class="form-control" id="address" rows="5" name="address"><?= $mosque->address ?></textarea>
              </div>

              <div class="form-group">
                  <label for="name">Tentang Masjid</label>
                  <textarea class="form-control" id="description" rows="10" name="description"><?= $mosque->description ?></textarea>
              </div>

              <div class="form-group">
                  <label>Latar Belakang</label>
                  <input type="file" class="form-control" id="background_image" name="background_image">
                  <input type="hidden" class="form-control" id="old_image" name="old_image" value="<?= $mosque->background_image ?>">
              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>

  <script>
      ClassicEditor
          .create(document.querySelector('#description'))
          .catch(error => {
              console.error(error);
          });
  </script>