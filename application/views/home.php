<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home page login and registrasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('T/') ?>css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img class="icon" src=<?= base_url('img/21.png') ?> height="110px" width="200px">
            <center>
                <img class="icon" src=<?= base_url('img/21.png') ?> height="110px" width="200px">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
        </div>
    </nav>

    <!-- Header - set the background image for the header in the line below-->
    <header class="py-5 bg-image-full" style="background-image: url('https://images.unsplash.com/photo-1531087131490-07836ca4341d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80'); height:80vh">
        <div class="text-center my-20" style="margin-top:130px;">
            <h1 class="text-white fs-3 fw-bolder">Laporan Masyarakat</h1>
            <p class="text-white-50 mb-0">Masyarakat mengadu di sini agar pemerintah bergerak</p>
            <a class="btn btn-primary mt-3" href="<?= base_url('auth_zz') ?>"><i class="fas fa-book"></i> login</a>
            <a class="btn btn-primary mt-3" href="<?= base_url('auth_zz/registrasi') ?>"><i class="fas fa-book"></i> registrasi/daftar</a>
        </div>
    </header>


    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('T/') ?>js/scripts.js"></script>
</body>

</html>