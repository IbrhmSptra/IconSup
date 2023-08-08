 <!-- Js Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

 <!-- Js AOS -->
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <!-- Initilized AOS -->
 <script>
     AOS.init();
 </script>
 <?php if (session()->getFlashData('success')) { ?>
     <script>
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-right',
             iconColor: 'white',
             customClass: {
                 popup: 'colored-toast'
             },
             showConfirmButton: false,
             timer: 5000,
             timerProgressBar: true
         })
         Toast.fire({
             icon: 'success',
             title: 'Pesan Terkirim'
         })
     </script>
 <?php } ?>