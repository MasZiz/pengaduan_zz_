<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <?= $this->session->flashdata('pengaduan'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">Riwayat Pengaduan</h5>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelapor</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Sub_Kategori</th>
                            <th>Laporan</th>
                            <th>Foto</th>
                            <th>Detail</th>
                            <th>status</th>

                        </tr>
                    </thead>

                    <?php
                    $i = 0;

                    foreach ($pengaduan as $ra) : $i = $i + 1;

                    ?>

                        <tbody>
                            <td><?= $i ?></td>

                            <td><?= $ra['nik'] ?></td>

                            <td><?= $ra['tgl_pengaduan'] ?></td>

                            <td><?= $ra['kategori'] ?></td>

                            <td><?= $ra['sub_kategori'] ?></td>

                            <td><?= $ra['isi_laporan'] ?></td>

                            <td><img src="<?= base_url() . '/assets/img/' . $ra['foto']; ?>" style="width:100px;"></td>

                            <td> <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#detailAdmin<?= $ra['id_pengaduan'] ?>">
                                    Detail</td>
                            </td>

                            <td>
                                <?php if ($ra['status'] == 'segera') : ?>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ngadu<?= $ra['id_pengaduan'] ?>">
                                        Segera
                                    </button>
                                <?php endif ?>
                                <?php if ($ra['status'] == "proses") : ?>
                                    <a type="button" class="btn btn-warning"data-toggle="modal" data-target="#ngadu<?= $ra['id_pengaduan'] ?>">
                                        Proses
                                    </a>
                                <?php endif ?>
                                <?php if ($ra['status'] == "selesai") : ?>
                                    <a type="button" class="btn btn-success">
                                        Selesai
                                    </a>
                                <?php endif ?>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="ngadu<?= $ra['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tindakan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('admin2/upload_tanggapan/') . $ra['id_pengaduan'] ?>">
                                                <fieldset disabled>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="exampleInputEmail1">Pelapor</label>
                                                            <input type="text" class="form-control" id="pelapor" aria-describedby="emailHelp" value="<?= $ra['nik'] ?>">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="exampleInputPassword1">Tanggal</label>
                                                            <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $ra['tgl_pengaduan'] ?>">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="exampleInputEmail1">Kategori</label>
                                                            <input type="text" class="form-control" id="kategori" aria-describedby="emailHelp" value="<?= $ra['kategori'] ?>">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="exampleInputEmail1">Subkategori</label>
                                                            <input type="text" class="form-control" id="sub_kategori" value="<?= $ra['sub_kategori'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1">Isi Pengaduan</label>
                                                        <textarea type="text" class="form-control" id="isi_laporan" value=""><?= $ra['isi_laporan'] ?></textarea>
                                                    </div>
                                                </fieldset>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tanggapan</label>
                                                    <textarea class="form-control" name="tanggapan" id="tanggapan" placeholder="Masukan Tanggapan"></textarea>
                                                </div>
                                                <div>
                                                    <label for="exampleInputEmail1" class="form-label">Status</label>
                                                    <select name="status" class="form form-control mt-2" id="">
                                                        <option selected>-- Pilih --</option>
                                                        <option value="proses">Proses</option>
                                                        <option value="selesai">Selesai</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="detailAdmin<?= $ra['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <fieldset disabled>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1">Pelapor</label>
                                                        <input type="text" class="form-control" id="pelapor" value="<?= $ra['nik'] ?>">
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputPassword1">Tanggal</label>
                                                        <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $ra['tgl_pengaduan'] ?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1">Kategori</label>
                                                        <input type="text" class="form-control" id="kategori" value="<?= $ra['kategori'] ?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1">Subkategori</label>
                                                        <input type="text" class="form-control" id="sub_kategori" value="<?= $ra['sub_kategori'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1">Isi Pengaduan</label>
                                                    <textarea type="text" class="form-control" id="isi_laporan" value=""><?= $ra['isi_laporan'] ?></textarea>
                                                </div>
                                            </fieldset>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                <div>
                                                    <img src="<?php echo base_url() . '/assets/img/' . $ra['foto']; ?>" alt="" style="width: 250px; border-radius: 5px;">
                                                </div>

                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>




                            </th>

                            </tr>


                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>




</div>