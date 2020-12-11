  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Khutbah</h6>
              <div>
                  <button type="button" class="btn btn-success" onclick="window.location='<?= base_url() ?>admin/khutbah/addForm'">Tambah</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr align="center">
                          <th>No</th>
                          <th>Ustadz</th>
                          <th>Kategori</th>
                          <th>Tanggal</th>
                          <th>Kontrol</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr align="center">
                          <th>No</th>
                          <th>Ustadz</th>
                          <th>Kategori</th>
                          <th>Tanggal</th>
                          <th>Kontrol</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $no = 0;
                        foreach ($khutbahs as $key => $khutbah) {
                            $no++;
                        ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $khutbah->nameUstadz ?></td>
                              <td><?= $khutbah->nameCategory ?></td>
                              <td><?= getTanggal($khutbah->dateKhutbah) ?></td>
                              <td align="center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger" onclick="window.location='<?= base_url('admin/deleteKhutbah/' . $khutbah->id) ?>'">Hapus</button>
                                      <button type="button" class="btn btn-primary" onclick="window.location='<?= base_url('admin/editKhutbah/' . $khutbah->id) ?>'">Edit</button>
                                  </div>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>