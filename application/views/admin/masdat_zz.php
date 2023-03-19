<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <h1 class="mt-4">MASTER DATA</h1>

            <!-- User Access -->
            <div class="card col-md-12 mt-4">
                <h5 class="card-header bg-secondary">User Access</h5>


                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Sebagai</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>

                         <?php foreach ($userAccess as $ua) : ?> 
                            <tr>


                                <td><?= $ua['nama'] ?></td>
                                <td>
                                    <?php
                                    if ($ua['level'] == 1) {
                                        echo 'Admin';
                                    } else if ($ua['level'] == 2) {
                                        echo 'petugas';
                                    } else if ($ua['level'] == 3) {
                                        echo 'user';
                                    }
                                    ?>
                                </td>
                                <td>

                                    <!-- Modal Edit User -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edituser<?= $ua['id'] ?>">
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edituser<?= $ua['id'] ?>" tabindex="-1" aria-labelledby="edituser" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edituser">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- Form Edit User -->
                                                    <form method="post" action="<?= base_url('admin_zz/fungsi_editUser/' . $ua['id']) ?>">
                                                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" value="<?= $ua['nama'] ?>" id="nama" name="nama" aria-describedby="usernameHelp">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">Sebagai</label>
                                                            <select  name='level' class="form-select" id="level" aria-label="Default select exampel">
                                                                <option selected>--Pilih Role Anda--</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">petugas</option>
                                                                <option value="3">user</option>
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-warning">Edit User</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>






                                <td>
                                    <a href="<?= base_url('admin_zz/fungsi_deleteUser/' . $ua['id']) ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">
                                            <i class="fa-solid fa-trash"></i></i>
                                        </button>
                                    </a>
                                </td>



                            </tr>
                        <?php endforeach ?>

                    </thead>
                </table>
            </div>
            <a href="<?= base_url('auth_zz/registrasi') ?>"><button type="button" class="btn btn-primary col-md-2">Tambah User</button></a>


        
            