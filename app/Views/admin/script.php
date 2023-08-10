 <!-- Bootstrap core JavaScript-->
 <script src="/assets/Admin/vendor/jquery/jquery.min.js"></script>
 <script src="/assets/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="/assets/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="/assets/Admin/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="/assets/Admin/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="/assets/Admin/js/demo/chart-area-demo.js"></script>
 <script src="/assets/Admin/js/demo/chart-pie-demo.js"></script>

 <!-- ---------------------------------------Modal Js------------------------------------------------- -->
 <script>
     $(document).ready(function() {
         // Modal Untuk Action Reports Pending (Admin)
         $('#confirmresolve').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget); // Button that triggered the modal
             var id = button.data('id'); // Extract ID from data-id attribute
             var modal = $(this);
             modal.find('.modal-footer a').attr('href', '/solved/' + id);
         });

         $('#confirmdecline').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget); // Button that triggered the modal
             var id = button.data('id'); // Extract ID from data-id attribute
             var modal = $(this);
             modal.find('.modal-footer a').attr('href', '/declined/' + id);
         });


         //  Modal Untuk Action User Management (Admin)
         $('#confirmpromote').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget); // Button that triggered the modal
             var id = button.data('id'); // Extract ID from data-id attribute
             var modal = $(this);
             modal.find('.modal-footer a').attr('href', '/promote/' + id);
         });

         $('#confirmdelete').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget); // Button that triggered the modal
             var id = button.data('id'); // Extract ID from data-id attribute
             var modal = $(this);
             modal.find('.modal-footer a').attr('href', '/delete/' + id);
         });
     });
 </script>


 <!-- ----------------------------------Toast JS------------------------------------- -->

 <!-- User Management Action Toast-->
 <?php if (session()->getFlashData('promote')) { ?>
     <script>
         $(document).ready(function() {

             // Menampilkan toast saat halaman dimuat
             $("#infopromote").toast({
                 autohide: false // Mencegah toast menghilang secara otomatis
             }).toast("show");

             // Menunda penyembunyian toast selama 5 detik
             setTimeout(function() {
                 $("#infopromote").toast("hide");
             }, 5000);

             $("#closeToastBtn").on("click", function() {
                 $("#infopromote").toast("hide");
             });
         });
     </script>
 <?php } ?>

 <?php if (session()->getFlashData('delete')) { ?>
     <script>
         $(document).ready(function() {

             // Menampilkan toast saat halaman dimuat
             $("#infodelete").toast({
                 autohide: false // Mencegah toast menghilang secara otomatis
             }).toast("show");

             // Menunda penyembunyian toast selama 5 detik
             setTimeout(function() {
                 $("#infodelete").toast("hide");
             }, 5000);

             $("#closeToastBtn").on("click", function() {
                 $("#infodelete").toast("hide");
             });
         });
     </script>
 <?php } ?>


 <!-- Reports Pending Action Toast-->
 <?php if (session()->getFlashData('solved')) { ?>
     <script>
         $(document).ready(function() {

             // Menampilkan toast saat halaman dimuat
             $("#inforesolve").toast({
                 autohide: false // Mencegah toast menghilang secara otomatis
             }).toast("show");

             // Menunda penyembunyian toast selama 5 detik
             setTimeout(function() {
                 $("#inforesolve").toast("hide");
             }, 5000);

             $("#closeToastBtn").on("click", function() {
                 $("#inforesolve").toast("hide");
             });
         });
     </script>
 <?php } ?>


 <?php if (session()->getFlashData('declined')) { ?>
     <script>
         $(document).ready(function() {
             // Menampilkan toast saat halaman dimuat
             $("#infodecline").toast({
                 autohide: false // Mencegah toast menghilang secara otomatis
             }).toast("show");

             // Menunda penyembunyian toast selama 5 detik
             setTimeout(function() {
                 $("#infodecline").toast("hide");
             }, 5000);

             $("#closeToastBtn").on("click", function() {
                 $("#infodecline").toast("hide");
             });
         });
     </script>
 <?php } ?>