<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori Pengaduan </h1>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">Kategori</h5>
                <button class="ml-auto btn btn-outline-primary" href="" data-toggle="modal" data-target="#tambahKategori">

                    Tambah Kategori
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th width='70%'>Kategori</th>
                            <th width='10%'>Aksi</th>

                        </tr>
                    </thead>


                    <?php
                    $count = 0;

                    foreach ($kategori as $k) :
                        $count = $count + 1;
                    ?>

                        <tbody>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $k['kategori']; ?></td>
                                <th><a class="btn btn-danger" href="<?php echo base_url('hapus_kategori/') . $k['id_kategori'] ?> "><i class="fa fa-trash"></i></a> <a class="btn btn-warning" href="<?php echo base_url('admin_zz/editKategori/') . $k['id_kategori'] ?> " data-toggle="modal" data-target="#editKategori<?= $k['id_kategori'] ?>"><i class="fa fa-edit"></i></a>
                                </th>


                            </tr>


                        </tbody>
                    <?php endforeach ?>                                                                                                                                                                                                                                             
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">SubKategori</h5>
                <button class="ml-auto btn btn-outline-primary" href="" data-toggle="modal" data-target="#tambahSubKategori">

                    Tambah SubKategori
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="sub_kategori" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='1%'>No</th>
                            <th width='20%'>Kategori</th>
                            <th width='20%'>SubKategori</th>
                            <th width='10%'>Aksi</th>

                        </tr>
                    </thead>


                    <?php
                    $count = 0;

                    foreach ($sub_kategori as $sk) :
                        $count = $count + 1;
                    ?>

                        <tbody>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $sk['kategori']; ?></td>
                                <td><?php echo $sk['sub_kategori']; ?></td>

                                <th><a class="btn btn-danger" href="<?php echo base_url('admin_zz/hapusSub_Kategori/') . $sk['id_subkategori'] ?>"><i class="fa fa-trash"></i></a> <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editSubKategori<?= $sk['id_subkategori'] ?>"><i class="fa fa-edit"></i></a>
                                </th>

                            </tr>


                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>



</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>




<!-- Modal -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin_zz/tambahkategori') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kategori" name="kategori" placeholder="Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">+ Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Tambah SubKategori Modal -->


<!-- Modal -->
<div class="modal fade" id="tambahSubKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah SubKategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin_zz/tambahSubKategori') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Kategori</h6>

                        <select name="kategori" id="kategori" type="text" class="form-control form-control-user">
                            <option selected value="">-- Pilih --</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                            <?php endforeach ?>
 
                        </select>

                    </div>
                </div>
                <div class="modal-body">
                    <h6>SubKategori</h6>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="sub_kategori" name="sub_kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">+ Tambah</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<?php foreach ($kategori as $k) : ?>
    <div class="modal fade" id="editKategori<?= $k["id_kategori"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <form action="<?php echo base_url('admin_zz/editKategori/' . $k["id_kategori"]) ?>" method="post">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Kategori</h6>
                        <td><input type="text" class="form-control form-control-user" id="kategori" name="kategori" value="<?= $k['kategori'] ?>"></td>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- //modA; -->
<?php foreach ($sub_kategori as $sk) : ?>
    <div class="modal fade" id="editSubKategori<?= $sk["id_subkategori"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit SubKategori</h5>
                    <form action="<?php echo base_url('admin_zz/editSub_kategori/' . $sk["id_subkategori"]) ?>" method="post">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Kategori</h6>
                        <td><input type="text" class="form-control form-control-user" id="kategori" name="kategori" value="<?= $sk['kategori'] ?>" disabled></td>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Subkategori</h6>
                        <td><input type="text" class="form-control form-control-user" id="subkategori" name="sub_kategori" value="<?= $sk['sub_kategori'] ?>"></td>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>