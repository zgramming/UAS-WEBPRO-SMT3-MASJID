<style>
    .card-news {
        /* min-height: 60vh;
        max-height: 60vh; */
        border-radius: 25px;
    }

    .card-news img {
        min-height: 35vh;
        max-height: 35vh;
    }

    .text-ellipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        line-clamp: 4;
        -webkit-line-clamp: 4;
        /* number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top bg-webapp shadow">
        <a class="navbar-brand" href="<?= base_url() ?>"><?= $mosque->name ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#khutbah">Khutbah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pengurus">Pengurus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#inventory">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#saran_masukkan">Saran & Masukkan</a>
                </li>

            </ul>
        </div>
    </nav>
    <div id="profil" class="container-fluid p-0 mt-5 ">
        <div class="wrapper-container">
            <img src="<?= base_url("upload/admin/mosque/" . $mosque->background_image) ?>" class="w-100 img-fluid profil-background" alt="Loading...">
            <div class="content-profil">
                <div class="h-100 d-flex justify-content-around align-items-center  ">

                    <div style="width: 60%; ">
                        <h1><b><?= $mosque->name ?> <?= $mosque->address ?></b></h1>
                        <p> </p>
                    </div>
                    <button type="button" class="btn btn-primary p-3 bg-webapp">Lihat Lokasi</button>
                </div>
            </div>
        </div>
    </div>
    <div id="khutbah" class="container-fluid ">
        <div class="d-flex justify-content-between">
            <h4 class="pt-3"><b>Khutbah Jum'at</b></h4>
            <a href="" class="text-webapp align-self-end">Lihat Selengkapnya</a>
        </div>
        <div class="row pt-3 pb-3">
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
    <div id="pengurus" class="container-fluid ">
        <div class="d-flex justify-content-between">
            <h4 class="pt-3"><b>Dewan Kepengurusan Masjid</b></h4>
        </div>
        <div class="row py-2">
            <?php foreach ($managements as $management) : ?>
                <div class="col-md-4">
                    <div class="card-dkm border rounded ">
                        <img src="<?= base_url("upload/admin/management/" . $management->image) ?>" class="w-100 img-fluid" alt="Loading...">
                        <div class="p-2">
                            <h5 class="font-weight-bold text-center"><?= $management->nameManagement ?></h5>
                            <p class="text-webapp text-center">
                                <?= $management->categoryManagement ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="berita" class="container-fluid  ">
        <div class="d-flex justify-content-between">
            <h4 class="pt-3"><b>Agenda</b></h4>

        </div>

        <div class="row py-2">
            <?php foreach ($news as $new) : ?>

                <div class="col-3">
                    <div class="card-news shadow">
                        <img src="<?= base_url("upload/admin/news/" . $new->image) ?>" class="w-100 img-fluid rounded-top " alt="Loading...">
                        <h5 class="px-3 pt-2"><?= $new->title ?></h5>
                        <div class="p-2">
                            <small class="text-ellipsis"><?= $new->short_content ?></small>
                        </div>
                        <div class="d-flex justify-content-end py-2 px-3">
                            <button type="button" class="btn btn-primary" onclick="window.location=' <?= base_url('news/' . $new->id) ?>'"> Selengkapnya </button>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>
    <div id="inventory" class="container-fluid py-5 ">
        <div class="row ">
            <div class="col-6 ">
                <img src="<?= base_url("upload/admin/inventory/bg-inventory.jpg") ?>" class="img-fluid rounded shadow" alt="Loading...">
            </div>
            <div class="col-6 ">
                <div class="h-100 d-flex align-items-center flex-column border rounded p-5">
                    <h2 class="mb-2">Inventory</h2>
                    <small class="mb-auto">
                        orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </small>
                    <button type="button" class="btn btn-primary btn-lg btn-block bg-white text-webapp font-weight-bold" onclick="window.location='<?= base_url('inventory') ?>'">
                        Lihat Selengkapnya
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="saran_masukkan" class="container-fluid py-5 ">
        <div class="row">
            <div class="col-6">
                <div class="h-100  d-flex align-items-start flex-column border rounded p-5">
                    <h2 class="mb-2 d-flex align-self-center"> Saran & Masukkan</h2>
                    <?= validation_errors(); ?>
                    <form action="" method="post" enctype="multipart/form-data" class="w-100" id="formSuggestion">
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">Saran & Masukkan</label>
                            <textarea class="form-control" id="suggestion" rows="10" name="suggestion"></textarea>
                        </div>
                        <input type="submit" value="Kirim Saran" class="btn btn-primary btn-lg btn-block bg-webapp shadow">
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="content-saran-masukkan h-100 bg-webapp d-flex align-items-center justify-content-center text-white font-weight-bold rounded px-5">
                    <h3 class="text-center">
                        Saran & Masukkan kalian sangat kami butuhkan
                        untuk membuat sistem ini menjadi lebih baik lagi.
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Swall Icon Available
        // [success,error,warning,info,question]
        $(document).ready(function() {
            $("#formSuggestion").submit(function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var suggestion = $("#suggestion").val();
                var data = $("#formSuggestion").serialize();
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('sendSuggestion') ?>',
                    data: data,
                    success: function(data) {
                        let result = $.parseJSON(data);
                        alert(result);
                        $("#email").val('');
                        $("#suggestion").val('');
                    },
                    error: function(error) {
                        if (error.status == '400') {
                            var jsonError = $.parseJSON(error.responseText);
                            Swal.fire({
                                icon: "error",
                                title: jsonError.message,

                            })

                        }
                    }
                });
            });
        });
    </script>