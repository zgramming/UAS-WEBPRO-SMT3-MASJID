  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
              <div>
                  <button type="button" class="btn btn-success" onclick="window.location='<?= base_url() ?>admin/product/addForm'">Tambah</button>
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
                          <th>Kategori</th>
                          <th>Satuan</th>
                          <th>Harga</th>
                          <th>Qty</th>
                          <th>Information</th>
                          <th>Kontrol</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr align="center">
                          <th>No</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Satuan</th>
                          <th>Harga</th>
                          <th>Qty</th>
                          <th>Information</th>
                          <th>Kontrol</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        $no = 0;
                        foreach ($products as $key => $product) {
                            $no++;
                        ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $product->name ?></td>
                              <td><?= $product->nameCategory ?></td>
                              <td><?= $product->nameUnit ?></td>
                              <td><?= getAngka($product->price) ?></td>
                              <td><?= getAngka($product->qty) ?></td>
                              <td>
                                  <p class="text-ellipsis"><?= $product->information ?></p>
                              </td>
                              <td align="center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger" onclick="window.location='<?= base_url('admin/deleteProduct/' . $product->id_product) ?>'">Hapus</button>
                                      <button type="button" class="btn btn-primary" onclick="window.location='<?= base_url('admin/editProduct/' . $product->id_product) ?>'">Edit</button>
                                  </div>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>