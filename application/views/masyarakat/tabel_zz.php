<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Anda</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1">Tambah</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= $this->session->flashdata('pengaduan'); ?>
                <table id="example1" class="table table-bordered table-striped">
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
                            <th>hasil</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <?php $i = 0;
                    foreach ($pengaduan as $p) : $i = $i + 1; ?>
                        <tr>
                            <td><?= $i ?></td>

                            <td><?= $p['nik'] ?></td>

                            <td><?= $p['tgl_pengaduan'] ?></td>

                            <td><?= $p['kategori'] ?></td>

                            <td><?= $p['sub_kategori'] ?></td>

                            <td><?= $p['isi_laporan'] ?></td>

                            <td><img src="<?= base_url() . '/assets/img/' . $p['foto']; ?>" style="width:100px;"></td>

                            <td> <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#detail<?= $p['id_pengaduan'] ?>">Detail</td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('masyarakat_zz/hasil/') . $p['id_pengaduan']  ?>">hasil</a>
                           


                            <td>
                                <?php if ($p['status'] == "segera") : ?>
                                    <a class="badge badge-danger">
                                        <?= $p['status']; ?>
                                    </a>
                                <?php elseif ($p['status'] == "proses") : ?>
                                    <a class="badge badge-info">
                                        <?= $p['status']; ?>
                                    </a>
                                <?php else : ?>
                                    <a class="badge badge-success">
                                        <?= $p['status']; ?>
                                    </a>
                                <?php endif; ?>
                            </td>

                            <!-- Modal -->

                            <div class="modal fade" id="detail<?= $p['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <input type="text" class="form-control" id="pelapor" aria-describedby="emailHelp" value="<?= $p['nik'] ?>">
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputPassword1">Tanggal</label>
                                                        <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $p['tgl_pengaduan'] ?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1">Kategori</label>
                                                        <input type="text" class="form-control" id="kategori" aria-describedby="emailHelp" value="<?= $p['kategori'] ?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1">Subkategori</label>
                                                        <input type="text" class="form-control" id="sub_kategori" aria-describedby="emailHelp" value="<?= $p['sub_kategori'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1">Isi Pengaduan</label>
                                                    <textarea type="text" class="form-control" id="isi_laporan" aria-describedby="emailHelp" value=""><?= $p['isi_laporan'] ?></textarea>
                                                </div>
                                                <center>
                                                    <div class="mb-6 col-md-12">

                                                        <?php if ($p['status'] == '0') : ?>
                                                            <a type="button" class="btn btn-info" href="<?php base_url('masyarakat_zz/hasil/') . $p['id_pengaduan']  ?>">
                                                                Segera
                                                            </a>
                                                        <?php endif ?>
                                                        <?php if ($p['status'] == "proses") : ?>
                                                            <a type="button" class="btn btn-warning" href="<?= base_url('masyarakat_zz/hasil/') . $p['id_pengaduan']  ?>">
                                                                Proses
                                                            </a>
                                                        <?php endif ?>
                                                        <?php if ($p['status'] == "selesai") : ?>
                                                            <a type="button" class="btn btn-success" href="<?= base_url('masyarakat_zz/hasil/') . $p['id_pengaduan']  ?>">
                                                                Selesai
                                                            </a>
                                                        <?php endif ?>
                                                    </div>
                                                </center>
                                            </fieldset>
                                            <div class="mb-3 text-align-center">
                                                <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                <div>
                                                    <img src="<?php echo base_url() . '/assets/img/' . $p['foto']; ?>" alt="" style="width: 250px; border-radius: 5px;">
                                                </div>


            </div>
        </div>


    </div>

<?php endforeach ?>
<tfoot>
    <!-- END    Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#BA9868;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Masyarakat_zz/fungsi_tambah') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Kategori</label>
                            <select class="form-select form-control" name="kategori" id="kategori">
                                <option selected>- Pilih -</option>

                                <?php foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['kategori'] ?>"><?= $k['kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Subkategori</label>
                            <select class="form-select form-control" name="subkategori" id="subkategori">
                                <option selected>- Pilih -</option>
                                <?php foreach ($sub_kategori as $sk) : ?>
                                    <option value=" <?= $sk['sub_kategori'] ?>">
                                        <?= $sk['sub_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto</label>
                            <input type="file" class="form-control-file" id="exampleInputPassword1" placeholder="date" name="foto">
                        </div>
                        <div class="form-group">
                            <label>Isi Laporan Pengaduan</label>
                            <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                    </table>
                </div>
            </div>



        </div>
    </div>
    </div>
    </div>
</tfoot>
</table>
</div>
