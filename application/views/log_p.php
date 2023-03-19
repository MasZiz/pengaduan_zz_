<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('auth_zz/login_petugas') ?>">
                                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>
                                <div class="form-floating mb-3">
                                    <label for="username">Username</label>
                                    <input class="form-control" id="username" name="username" type="text" />
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="inputPassword">Password</label>
                                    <input class="form-control" id="password" name="password" type="password" />
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <button type="submit" class="btn btn-user btn-block btn-login" style="background-color: #93764D; color:white;">Login</button>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="<?= base_url('auth_zz/admin_register') ?>">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>