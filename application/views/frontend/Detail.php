<div class="container pt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="<?= ($product->image == "default.png") ? base_url('upload/default.png') : base_url('upload/admin/product/' . $product->image) ?>" class="img-fluid img-thumbnail img-detail-product" alt="Responsive image">
        </div>
        <div class="col-md-6">
            <div class="pl-4">
                <h1><b><?= $product->name ?></b></h1>
                <hr>
                <br>
                <div class="d-flex justify-content-start">
                    <h4>Harga</h4>
                    <h3 class="pl-5"><b class="text-danger">Rp.<?= getAngka($product->price) ?> / </b><small><?=$product->nameUnit?></small></h3>
                </div>
                <br>
                <div class="d-flex justify-content-start">
                    <h4>Jumlah</h4>
                    <div class="d-flex justify-content-start pl-5">
                        <div class="pr-2 align-self-center">
                            <button type="button" class="btn btn-circle btn-sm btn-danger" onclick="toggleIncrement('minus')"> <i class="fas fa-minus"></i></button>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="increment_quantity" id="increment_quantity" onkeyup="cekMaxQty(); cekAngka(this); " style="text-align: center;" value="0">
                            <input type="hidden" name="max_qty" id="max_qty" value="<?= $product->qty ?>">
                        </div>
                        <div class="pl-2 align-self-center">
                            <button type="button" class="btn btn-circle btn-sm btn-success" onclick="toggleIncrement('plus')"> <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <center id="error_qty" class="text-danger pt-1">Maks pemesanan <b><?= $product->qty ?></b> </center>
                <br>
                <div>
                    <button class="btn btn-md btn-block btn-success"><i class="fas fa-cart-plus"></i> Tambahkan ke Keranjang</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="card-text pl-5" style="line-height: 10;">
                    <h6><?= $product->information ?></h6>
                </p>
            </div>
        </div>
        <br>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Produk Terkait</h2>

        </div>
    </div>
    <div class="row">
        <?php foreach ($products as $key => $anotherProduct) : ?>
            <div class="col-md-3">
                <a href="<?= base_url('detail/' . $anotherProduct->id_product) ?>">
                    <div class="card">
                        <img class="card-img-top" src="<?= ($anotherProduct->image == "default.png") ? base_url('upload/default.png') : base_url('upload/admin/product/' . $anotherProduct->image) ?>" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><b><?= $anotherProduct->name ?></b></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
</div>