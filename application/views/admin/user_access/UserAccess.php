  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
              <div>
                  <button type="button" class="btn btn-success" onclick="window.location='<?= base_url() ?>admin/user-akses/addForm'">Tambah</button>
              </div>
          </div>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr align="center">
                          <th>No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Kontrol</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr align="center">
                          <th>No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Kontrol</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $no = 0;
                        foreach ($users as $key => $user) {
                            $no++;
                        ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $user->name ?></td>
                              <td><?= $user->email ?></td>
                              <td align="center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger" onclick="window.location='<?= base_url('admin/deleteUser/' . $user->id) ?>'">Hapus</button>
                                      <button type="button" class="btn btn-primary" onclick="window.location='<?= base_url('admin/editUser/' . $user->id) ?>'">Edit</button>
                                  </div>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>