<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h6 class="m-0 font-weight-bold text-primary mt-2">Selesai Pengaduan</h6>

            </div>
        </div>

        <div class="card-body">
            <div class="container">

                <form method="post" action="<?= base_url('admin2/upload_tanggapan/') . $this->session->flashdata('id_pengaduan'); ?>">
                    <fieldset disabled>
                        <div class="row">
                        <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1">Pelapor</label>
                                <input type="text" class="form-control" id="pelapor" value="<?= $this->session->flashdata('nama'); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputPassword1">Tanggal</label>
                                <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $this->session->flashdata('tgl_pengaduan'); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1">Kategori</label>
                                <input type="text" class="form-control" id="kategori" value="<?= $this->session->flashdata('kategori'); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1">Subkategori</label>
                                <input type="text" class="form-control" id="sub_kategori" value="<?= $this->session->flashdata('sub_kategori'); ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Isi Pengaduan</label>
                            <textarea type="text" class="form-control" id="isi_laporan" value=""><?=$this->session->flashdata('isi_laporan'); ?></textarea>
                        </div>



                    </fieldset>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                        <div>
                            <img src="<?php echo base_url() . '/assets/img/upload/' . $this->session->flashdata('foto'); ?>" alt="" style="width: 250px; border-radius: 5px;">
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h6 class="m-0 font-weight-bold text-primary mt-2">Data Laporan</h6>

            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='1%'>No</th>
                            <th width='10%'>Tanggal</th>
                            <th width='20%'>Isi Tanggapan</th>
                            <th width='5%'>Petugas</th>



                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 0;

                        foreach ($prosestanggapan as $pt) :
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $pt['tgl_tanggapan'] ?></td>
                                <td><?= $pt['tanggapan'] ?></td>
                                <td><?= $pt['nama_petugas'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>

        <!-- /.container-fluid -->

    