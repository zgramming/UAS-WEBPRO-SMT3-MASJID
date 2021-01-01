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
                              <td align="center" style="vertical-align: middle;">
                                  <b class="text-webapp stock_corrupt" data-inventory='<?= json_encode($inventory) ?>'>
                                      <?= $inventory->stock_corrupt ?: "0" ?>
                                  </b>
                              </td>
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


  <div class="modal fade" id="modalStockCorrupt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <form action="" id="formStockCorrupt" method="post" class="w-100">
              <div class="modal-content border-0">
                  <div class="modal-header bg-webapp text-white">
                      <h4 class="modal-title ">Update Stok Rusak</h4>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" id="inp[id]" name="inp[id]">
                      <div class="form-group">
                          <label for="name">Total</label>
                          <input type="text" class="form-control" id="inp[stock_corrupt]" name="inp[stock_corrupt]" value="22">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" onclick="closeModal('modalStockCorrupt')">Batal</button>
                      <button type="submit" class="btn btn-primary" id="" onclick="">Simpan</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

  <script>
      $(document).ready(function() {

          $(".stock_corrupt").click(function(e) {
              e.preventDefault();
              var inventory = $(this).data('inventory');
              $("#inp\\[stock_corrupt\\]").val(inventory.stock_corrupt || 0);
              $("#inp\\[id\\]").val(inventory.id);



              showModal('modalStockCorrupt');
          })


          $("#formStockCorrupt").submit(function(e) {
              e.preventDefault();
              let id = $("#inp\\[id\\]").val();
              let data = $("#formStockCorrupt").serialize();
              let url = '<?= base_url("admin/updateStockCorrupt/") ?>' + id;
              $.ajax({
                  url: url,
                  type: "POST",
                  data: data,
                  success: function(success) {
                      let result = $.parseJSON(success);

                      Swal.fire({
                          title: result.message,
                          icon: "success",
                          confirmButtonText: 'Ok'
                      }).then((result) => {
                          location.reload();
                      });

                  },
                  error: function(error) {
                      alert("error");

                  }
              });
          })

      });
  </script>