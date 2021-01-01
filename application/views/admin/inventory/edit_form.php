  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Inventory</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/inventory'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <center><?= $this->session->flashdata('error_file') ?: "" ?></center>

          <form action="<?= base_url('admin/updateInventory/' . $inventory->id) ?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="id_inventory_category">Kategori</label>
                  <select class="form-control" id="id_inventory_category" name="id_inventory_category">
                      <?php foreach ($categories as $key => $category) : ?>
                          <option value="<?= $category->id ?>" <?= ($category->id == $inventory->id_inventory_category) ? "selected" : "" ?>><?= $category->name ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= $inventory->name ?>">
              </div>

              <div class="form-group">
                  <label for="name">Kode</label>
                  <input type="text" class="form-control" id="kode" name="kode" value="<?= $inventory->kode ?>">
              </div>

              <div class="form-group">
                  <label for="name">Stok</label>
                  <input type="text" class="form-control" id="stock" name="stock" value="<?= getAngka($inventory->stock) ?>" onkeyup="cekAngka(this)">
              </div>

              <div class="form-group">
                  <label for="image">Gambar</label>
                  <input type="file" class="form-control" id="image" name="image">
                  <input type="hidden" name="old_image" id="old_image" value="<?= $inventory->image ?>">
              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>