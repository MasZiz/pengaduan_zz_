  <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid px12">
              <h1 class="mt-8">Tables</h1>
              <ol class="breadcrumb mb12">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item active">Tables</li>
              </ol>
              <div class="card mb-4">
              </div>
              <div class="card mb-6">
                  <div class="card-header">
                      <i class="fas fa-table me-1"></i>
                      DataTable Example
                  </div>
                  <div class="card-body">
                      <a href="<?= base_url('home/cepu_masyarakat') ?>" class="btn btn-primary btn-sm btn-round ml-auto"><i class="fa fa-plus"></i> Pengaduan</a>
                      <table id="datatablesSimple">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>tanggal</th>
                                  <th>katagori</th>
                                  <th>isi</th>
                                  <th>Status</th>

                              </tr>
                          </thead>

                          </tbody>
                      </table>
                  </div>
              </div>

          </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
              <div class="d-flex align-items-center justify-content-between small">
                  <div>
                      &middot;

                  </div>
              </div>
          </div>
      </footer>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('azzet/') ?>js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="<?= base_url('azzet/') ?>js/datatables-simple-demo.js"></script>
  </body>

  </html>