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
