

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Masyarakat</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>username</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                    
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($masyarakat as $al) : ?>
                                <tr>

                                    <td><?= $i ?></td>
                                    <td><?= $al['username'] ?></td>
                                    <td><?= $al['nik'] ?></td>
                                    <td><?= $al['nama'] ?></td>
                                    <td><?= $al['telepon'] ?></td>
                                    <td><?= $al['level'] ?></td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>