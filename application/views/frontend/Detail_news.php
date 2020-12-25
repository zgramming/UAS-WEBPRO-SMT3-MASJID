<body>

    <div class="container">
        <div class="row my-5 no-gutters">

            <div class="col-8 border rounded">
                <div class="card-news-detail">
                    <img src="<?= base_url("upload/admin/news/" . $news->image) ?>" class="w-100 img-fluid rounded-top" alt="Loading...">
                    <div class="d-flex justify-content-end ">
                        <div class="bg-webapp p-2 mr-3 text-white">
                            <?= getTanggal($news->date, "t") ?>
                        </div>
                    </div>
                    <h1 class="p-3">
                        <?= $news->title ?>
                    </h1>
                    <div class="p-4 font-weight-lighter">
                        <?= $news->full_content ?>
                    </div>

                    <div class="d-flex justify-content-end p-3">
                        Dibuat pada : <?= $news->created_date ?>
                    </div>
                </div>
            </div>
            <div class="col-4 px-5">
                <h6>Berita Lainnya</h6>
                <div class="row no-gutters">
                    <?php foreach ($anotherNews as $aNews) : ?>
                        <div class="col-md-12">
                            <div class="card-another-news">
                                <a href="<?= base_url("news/" . $aNews->id) ?>">
                                    <img src="<?= base_url("upload/admin/news/" . $aNews->image) ?>" class="w-100 img-fluid rounded-top" alt="Loading...">
                                </a>
                                <div class="card-another-news-title w-100 rounded-bottom text-white font-weight-bold p-2">
                                    <?= $aNews->title ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>

</body>