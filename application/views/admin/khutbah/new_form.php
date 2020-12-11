  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Khutbah</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/khutbah'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <form action="<?= base_url('admin/khutbah/add') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="id_ustadz">Ustadz</label>
                  <select class="form-control" id="id_ustadz" name="id_ustadz">
                      <?php foreach ($ustadz as $key => $value) : ?>
                          <option value="<?= $value->id ?>"><?= $value->name ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="id_khutbah_category">Kategori Khutbah</label>
                  <select class="form-control" id="id_khutbah_category" name="id_khutbah_category">
                      <?php foreach ($khutbahCategories as $key => $category) : ?>
                          <option value="<?= $category->id ?>"><?= $category->name ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="form-group">
                  <label for="name">Judul</label>
                  <input type="text" class="form-control" id="title" placeholder="Berpuasa membawa berkah yang tidak terhingga ..." name="title" value="">
              </div>

              <div class="form-group">
                  <label for="short_content">Deskripsi singkat</label>
                  <textarea class="form-control" id="short_content" rows="20" name="short_content"></textarea>
              </div>

              <div class="form-group">
                  <label for="name">Tanggal Khutbah</label>
                  <input type="text" class="form-control input-sm datepicker" id="date" name="date">
              </div>


              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>