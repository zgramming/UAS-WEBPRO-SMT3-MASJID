  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Agenda</h6>
              <div>
                  <button type="button" class="btn btn-light" onclick="window.location='<?= base_url() ?>admin/news'">Kembali</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <center><?= validation_errors() ?></center>
          <center><?= $this->session->flashdata('error_file') ?: "" ?></center>

          <form action="<?= base_url('admin/updateNews/' . $news->id) ?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="name">Judul</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?= $news->title ?>">
              </div>

              <div class="form-group">
                  <label for="name">Tanggal Publish</label>
                  <input type="text" class="form-control input-sm " id="date" name="date" value="<?= $news->date ?: date('Y-m-d') ?>" readonly>
              </div>

              <div class="form-group">
                  <label for="name">Ringkasan</label>
                  <textarea class="form-control" id="short_content" rows="10" name="short_content"><?= $news->short_content ?></textarea>
              </div>

              <div class="form-group">
                  <label for="name">Deskripsi Lengkap</label>
                  <textarea class="form-control" id="full_content" rows="10" name="full_content"><?= $news->full_content ?></textarea>
              </div>

              <div class="form-group">
                  <label for="image">Gambar</label>
                  <input type="file" class="form-control" id="image" name="image">
                  <input type="hidden" class="form-control" id="old_image" name="old_image" value="<?= $news->image ?>">

              </div>

              <div class="float-right"><input type="submit" value="Simpan" class="btn btn-success"></div>
          </form>
      </div>
  </div>

  <script>
      ClassicEditor
          .create(document.querySelector('#short_content'))
          .catch(error => {
              console.error(error);
          });
      ClassicEditor
          .create(document.querySelector('#full_content'))
          .catch(error => {
              console.error(error);
          });
  </script>