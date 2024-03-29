<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h6 class="m-0 font-weight-bold text-primary mt-2">Proses Pengaduan</h6>

            </div>
        </div>
        <?php

                    foreach ($pengaduan as $p) :
                        
                    ?>

        <div class="card-body">
            <div class="container">

                <form method="post" action="<?= base_url('admin2/upload_tanggapan/') . $p['id_pengaduan'] ?>">
                    <fieldset disabled>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1">Pelapor</label>
                                <input type="text" class="form-control" id="pelapor" value="<?= $p['nik'] ?>">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputPassword1">Tanggal</label>
                                <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $p['tgl_pengaduan'] ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1">Kategori</label>
                                <input type="text" class="form-control" id="kategori" value="<?= $p['kategori'] ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1">Subkategori</label>
                                <input type="text" class="form-control" id="sub_kategori" value="<?= $p['sub_kategori'] ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Isi Pengaduan</label>
                            <textarea type="text" class="form-control" id="isi_laporan" value=""><?= $p['isi_laporan'] ?></textarea>
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                        <div>
                            <img src="<?php echo base_url() . '/assets/img/' . $p['foto']; ?>" alt="" style="width: 250px; border-radius: 5px;">
                        </div>
                        <?php endforeach ?>
                        
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
            <button type="button" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#selesai">
                Selesai
            </button>

            <!-- Modal -->
            <div class="modal fade" id="selesai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin mengubah status menjadi selesai?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="<?= base_url('admin2/upload_tanggapan/') . $this->session->flashdata('id_pengaduan'); ?> ">
                            <div class="modal-body">
                                <div class="form-group">
                                    <h6>Tanggapi</h6>
                                    <input type="text" class="form-control form-control-user" id="tanggapan" name="tanggapan">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
