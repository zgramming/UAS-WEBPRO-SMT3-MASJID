<!-- <div class="container-fluid">
    <div class="row row-cols-2">
        </div>
    </div> -->
<div class="container pt-5">
    <?php foreach ($categories as $indexCategory => $category) : ?>
        <h1><?= $category->name ?></h1>
        <hr>
        <div class="row">
            <?php foreach ($products as $indexProduct => $product) : ?>
                <?php if ($product->id_category == $category->id_category) : ?>
                    <div class="col-md-4">
                        <a href="<?= base_url('detail/' . $product->id_product) ?>">
                            <div class="card">
                                <img class="card-img-top" src="<?= ($product->image == "default.png") ? base_url('upload/default.png') : base_url('upload/admin/product/' . $product->image) ?>" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"><b><?= $product->name ?></b></p>
                                </div>
                            </div>
                        </a>
                        <br>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

</div>