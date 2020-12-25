<body>
    <div class="container ">
        <div class="row border rounded mt-5">
            <div class="col-2">
                <img src="<?= base_url("upload/admin/ustadz/" . $khutbah->imageUstadz) ?>" alt="Ustadz..." class="img-fluid m-2 rounded-circle shadow" style="min-height: 30vh;">
            </div>
            <div class="col-10 p-2">
                <div class="d-flex justify-content-between">
                    <h3><b><?= $khutbah->nameUstadz ?></b></h3>
                    <h6 class="p-2 rounded bg-primary text-white"><?= $khutbah->nameCategory ?></h6>
                </div>
                <small><?= date('l', strtotime($khutbah->dateKhutbah)) . ", " . getTanggal($khutbah->dateKhutbah, "t") ?></small>
                <center class="font-weight-bold font-italic py-3">"<?= $khutbah->titleKhutbah ?>"</center>
                <small class="font-weight-light pt-1">
                    <?= $khutbah->contentKhutbah ?>
                </small>
            </div>
        </div>

        <p class="py-3">Lihat Khutbah Lainnya : </p>
        <div class="row pb-5">
            <?php foreach ($khutbahs as $khutbah) : ?>
                <div class="col-sm-4 col-md-2">
                    <div class="card-khutbah">
                        <a href="<?= base_url("khutbah/" . $khutbah->id) ?>">
                            <img src="<?= base_url("upload/admin/ustadz/" . $khutbah->imageUstadz) ?>" class="w-100 img-fluid" alt="Loading...">
                        </a>
                        <div class="card-khutbah-content pb-1 pl-3 pr-3 pt-1">
                            <h6><?= $khutbah->nameUstadz ?></h6>
                            <small class="text-white"><?= getTanggal($khutbah->dateKhutbah, "t") ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>