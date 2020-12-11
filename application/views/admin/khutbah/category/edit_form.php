  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Kategori Khutbah</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/khutbah/category'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <form action="<?= base_url('admin/updateCategoryKhutbah/' . $category->id) ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="Puasa, Zakat, dll " name="name" value="<?= $category->name ?>">
              </div>
              <div class="form-group">
                  <label for="description">Keterangan</label>
                  <textarea class="form-control" id="description" rows="3" name="description"><?= $category->description ?></textarea>
              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>