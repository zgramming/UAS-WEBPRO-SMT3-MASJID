<style>
    .card-inventory {
        position: relative;
    }

    .card-inventory img {
        border-radius: 30px;
    }

    .card-inventory-code {
        position: absolute;
        top: 0;
        right: 0;
    }
</style>

<body>
    <div class="container mx-auto my-5">
        <?php foreach ($categoryInventories as $ctgInventory) : ?>
            <h1><?= $ctgInventory->name ?></h1>
            <div class="row pb-5">
                <?php foreach ($inventories as $inventory) : ?>
                    <?php if ($inventory->id_inventory_category == $ctgInventory->id) : ?>
                        <div class="col-3">
                            <div class="card-inventory border shadow rounded ">
                                <img src="<?= base_url("upload/admin/inventory/" . $inventory->image) ?>" class="w-100 img-fluid p-3" alt="Loading...">
                                <div class="d-flex align-items-start flex-column px-3 py-1">
                                    <h5 class="font-weight-bold"><?= $inventory->name ?></h5>
                                    <small class="py-2"> Jumlah : <?= $inventory->stock ?></small>
                                    <small class="py-2"> Kondisi : <?= $inventory->stock ?></small>

                                </div>
                                <div class="card-inventory-code p-1 rounded bg-webapp font-weight-bold text-white">
                                    <?= $inventory->kode ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach ?>
    </div>
</body>