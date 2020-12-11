  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Management</h6>
              <div>
                  <button type="button" class="btn btn-success" onclick="window.location='<?= base_url() ?>admin/management/addForm'">Tambah</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr align="center">
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Tanggal Lahir</th>
                          <th>Kontrol</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr align="center">
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Tanggal Lahir</th>
                          <th>Kontrol</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $no = 0;
                        foreach ($managements as $key => $management) {
                            $no++;
                        ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><img src="<?= ($management->image != null) ? base_url('upload/admin/management/' . $management->image) : base_url("upload/default.png") ?>" height="80px" width="80px" alt=""></td>
                              <td><?= $management->nameManagement ?></td>
                              <td><?= $management->categoryManagement ?></td>
                              <td><?= getTanggal($management->birth_date) ?></td>
                              <td align="center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger" onclick="window.location='<?= base_url('admin/deleteManagement/' . $management->id) ?>'">Hapus</button>
                                      <button type="button" class="btn btn-primary" onclick="window.location='<?= base_url('admin/editManagement/' . $management->id) ?>'">Edit</button>
                                  </div>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>