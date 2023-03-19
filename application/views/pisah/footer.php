 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('logout') ?>" onclick="return confirm('Apa anda yakin?')">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <!-- Bootstrap core JavaScript-->
 <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
 <script>
     $(document).ready(function() {

         $('#kategori').change(function() {
             var id = $(this).val();
             $.ajax({
                 url: "<?php echo base_url('masyrakat_zz/get_sub_kategori') ?>",
                 method: "POST",
                 data: {
                     id: id
                 },
                 async: true,
                 dataType: 'json',
                 success: function(data) {

                     var html = '';
                     var i;
                     for (i = 0; i < data.length; i++) {

                         html += '<option value=' + data[i].id_subkategori + '>' + data[i].subkategori + '</option>';
                     }
                     $('#subkategori').html(html);
                     // console.dir(data);
                     // console.log();    

                 }
             });
             return false;

         });

     });
 </script>
 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
 <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

 <!-- custom scripts -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

 </body>

 </html>