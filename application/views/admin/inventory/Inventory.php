  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Inventory</h6>
              <div>
                  <button type="button" class="btn btn-success" onclick="window.location='<?= base_url() ?>admin/inventory/addForm'">Tambah</button>
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
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Total Stok</th>
                          <th>Total Rusak</th>
                          <th>Kontrol</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr align="center">
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Total Stok</th>
                          <th>Total Rusak</th>
                          <th>Kontrol</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $no = 0;
                        foreach ($inventories as $key => $inventory) {
                            $no++;
                        ?>
                          <tr>
                              <td align="center" style="vertical-align: middle;"><?= $no ?></td>
                              <td align="center" style="vertical-align: middle;"><img src="<?= is_file(FCPATH) . 'upload/admin/inventory/' . $inventory->image ? base_url('upload/admin/inventory/' . $inventory->image) : base_url("upload/default.png") ?>" height="80px" width="80px" alt=""></td>
                              <td align="center" style="vertical-align: middle;"><?= $inventory->kode ?></td>
                              <td style="vertical-align: middle;"><?= $inventory->name ?></td>
                              <td style="vertical-align: middle;"><?= $inventory->nameCategory ?></td>
                              <td align="center" style="vertical-align: middle;"><?= $inventory->stock ?></td>
                              <td align="center" style="vertical-align: middle;"><?= $inventory->stock_corrupt ?: "0" ?></td>
                              <td align="center" style="vertical-align: middle;">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger" onclick="window.location='<?= base_url('admin/deleteInventory/' . $inventory->id) ?>'">Hapus</button>
                                      <button type="button" class="btn btn-primary" onclick="window.location='<?= base_url('admin/editInventory/' . $inventory->id) ?>'">Edit</button>
                                  </div>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>