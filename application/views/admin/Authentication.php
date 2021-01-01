<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        position: relative;
    }

    .container-login {
        position: absolute;
        top: 25vh;
        left: 30vw;
        max-width: 45vw;
        border-radius: 10px;
        background-color: white;
    }
</style>

<body class="bg-webapp">
    <div class="container container-login">
        <div class="d-flex flex-column">
            <h3 class="font-weight-bold text-center text-webapp pt-3">Login Admin</h3>
            <center><?= validation_errors() ?></center>
            <center class="text-danger"><?= $this->session->flashdata('error_login') ?: "" ?></center>
            <form class="form" action="<?= base_url("admin/auth") ?>" method="post">
                <div class="form-group">
                    <label for="email" class="text-info text-webapp">Email:</label><br>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="text-info text-webapp">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-info btn-block bg-webapp" value="submit">
                </div>

            </form>
        </div>
    </div>

</body>