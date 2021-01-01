  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Inventory</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/inventory'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <center><?= $this->session->flashdata('error_file') ?: "" ?></center>
          <form action="<?= base_url('admin/inventory/add') ?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="id_inventory_category">Kategori</label>
                  <select class="form-control" id="id_inventory_category" name="id_inventory_category">
                      <?php foreach ($categories as $key => $category) : ?>
                          <option value="<?= $category->id ?>"><?= $category->name ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="" name="name">
              </div>

              <div class="form-group">
                  <label for="name">Kode</label>
                  <input type="text" class="form-control" id="kode" placeholder="" name="kode">
              </div>

              <div class="form-group">
                  <label for="name">Stok</label>
                  <input type="text" class="form-control" id="stock" placeholder="" name="stock">
              </div>

              <div class="form-group">
                  <label for="image">Gambar</label>
                  <input type="file" class="form-control" id="image" name="image">
              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>