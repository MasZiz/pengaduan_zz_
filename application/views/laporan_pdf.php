<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pengaduan Masyarakat</title>
</head>

<body>
    <div class="information">
        <table width="50%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h3>PDF PENGADUAN MASYARAKAT</h3>
                    <pre>
<br /><br />
Date: <?= date('y-m-d') ?>
</pre>
                </td>
            </tr>
        </table>
    </div>
    <br />
    <div class="invoice">
        <div style="text-align:center">
        </div>
        <div class="table-responsive">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Kategori</th>
                        <th>Sub Kategori</th>
                        <th>Laporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengaduan as $p) : ?>
                        <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $p['nik'] ?></td>
                            <td><?= $p['kategori'] ?></td>
                            <td><?= $p['sub_kategori'] ?></td>
                            <td><?= $p['isi_laporan'] ?></td>
                            <td><?= $p['status'] ?></td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>