  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/product'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <form action="<?= base_url('admin/updateProduct/' . $product->id_product) ?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="category">Kategori</label>
                  <select class="form-control" id="category" name="category">
                      <?php foreach ($categories as $key => $category) : ?>
                          <option value="<?= $category->id_category ?>" <?= ($category->id_category == $product->id_category) ? "selected" : "" ?>><?= $category->name ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="unit">Unit</label>
                  <select class="form-control" id="unit" name="unit">
                      <?php foreach ($units as $key => $unit) : ?>
                          <option value="<?= $unit->id_unit ?>" <?= ($unit->id_unit == $product->id_unit) ? "selected" : "" ?>><?= $unit->name ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="Ketoprak / Sate / Dll" name="name" value="<?= $product->name ?>">
              </div>

              <div class="form-group">
                  <label for="price">Harga</label>
                  <input type="text" class="form-control" id="price" name="price" onkeyup="cekAngka(this)" value="<?= getAngka($product->price) ?>">
              </div>

              <div class="form-group">
                  <label for="qty">Kuantitas</label>
                  <input type="text" class="form-control" id="qty" name="qty" onkeyup="cekAngka(this)" value="<?= getAngka($product->qty) ?>">
              </div>

              <div class="form-group">
                  <label for="information">Keterangan</label>
                  <textarea class="form-control" id="information" rows="3" name="information"><?= $product->information ?></textarea>
              </div>

              <div class="form-group">
                  <label for="image">Gambar</label>
                  <input type="file" class="form-control" id="image" name="image" value="<?= $product->image ?>">
                  <input type="hidden" class="form-control" id="old_image" name="old_image" value="<?= $product->image ?>">
              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>