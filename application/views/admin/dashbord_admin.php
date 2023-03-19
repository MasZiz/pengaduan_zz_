<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 fw-bolder">Dashboard</h1>

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-dark mb-4">
                            <div class="card-body fw-bolder">Pengaduan</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?= $jumlah['pengaduan'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-warning text-dark mb-4">
                            <div class="card-body fw-bolder">Proses</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?= $jumlah['proses'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success text-dark mb-4">
                            <div class="card-body fw-bolder">Selesai</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?= $jumlah['selesai'] ?>
                            </div>
                        </div>
                    </div>

               