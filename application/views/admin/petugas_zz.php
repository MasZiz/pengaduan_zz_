<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Penganduan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Petugas</h3>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1">Tambah</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($petugas as $al) : ?>
                                <tr>
                                    <input type="hidden" name="nik" value="<? $al['username'] ?>">
                                    <input type="hidden" name="nama" value="<? $al['nama'] ?>">
                                    <input type="hidden" name="telepon" value="<? $al['no_telp'] ?>">
                                    <input type="hidden" name="status" value="<? $al['status'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['username'] ?></td>
                                    <td><?= $al['nama'] ?></td>
                                    <td><?= $al['no_telp'] ?></td>
                                    <td><?= $al['level'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                        <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajukan Pengaduan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('c_yusuf_admin/tambahpetugas') ?>" method="post">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                                    </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                                    </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                                    </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="no_telp">Telepon</label>
                                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Telepon">
                                                    </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select class="form-control" id="level" name="level">
                                                        <option>--Pilih--</option>
                                                        <option>Admin</option>
                                                        <option>Operator</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>