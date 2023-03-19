    <div id="layoutSidenav_content">
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Pengaduan</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Pengaduan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Input Pengaduan</h4>
                                    </div>
                                </div>
                                
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" id="kategori" name="kategori">
                                                        <option>- Pilih - </option>
                                                        <option value="1">Prasarana Umum</option>
                                                        <option value="2">Lingkungan Hidup</option>
                                                        <option value="3">Perhubungan</option>
                                                        <option value="4">Kesehatan</option>
                                                        <option value="5">Pelanggaran Peraturan Daerah</option>
                                                        <option value="6">Perizinan</option>
                                                        <option value="7">Sosial</option>
                                                        <option value="8">Perpajakan</option>
                                                        <option value="9">Komunikasi dan Informatika</option>
                                                        <option value="10">Kepegawaian</option>
                                                        <option value="11">Pelayanan Kecamatan Kelurahan</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sub Kategori</label>
                                                    <select class="form-control" id="subkategori" name="subkategori">
                                                        <option>- Pilih -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" class="form-control" id="date" name="tanggal" placeholder="Password">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Isi Laporan Pengaduan</label>
                                                    <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Upload Foto</label>
                                                    <input type="file" class="form-control-file" id="fileFoto" class="fileFoto" name="foto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-success" type="submit">Laporkan</button>
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>