  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/category'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <form action="<?= base_url('admin/updateCategory/' . $category->id_category) ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="Menu Utama / Menu Penutup" name="name" value="<?= $category->name ?>">
              </div>
              <div class="form-group">
                  <label for="information">Keterangan</label>
                  <textarea class="form-control" id="information" rows="3" name="information"><?= $category->information ?></textarea>
              </div>
              <div class="form-group">
                  <label for="name">Order Position</label>
                  <input type="text" class="form-control" id="order_position" name="order_position" value="<?= getAngka($category->order_position) ?>" onkeyup="cekAngka(this)">
              </div>
              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>