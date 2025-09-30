 <!-- Core JS -->
 <script src="{{ asset('admin-assets/vendors/core/core.js') }}"></script>

 <!-- Plugin JS -->
 <!-- <script src="{{ asset('admin-assets/vendors/jquery/jquery.min.js') }}"></script> -->
 <script src="{{ asset('admin-assets/vendors/datatables.net/dataTables.js') }}"></script>
 <script src="{{ asset('admin-assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

 <!-- Feather Icons -->
 <script src="{{ asset('admin-assets/vendors/feather-icons/feather.min.js') }}"></script>

 <!-- App JS -->
 <script src="{{ asset('admin-assets/js/app.js') }}"></script>

 <!-- Custom JS for DataTables -->
 <script src="{{ asset('admin-assets/js/data-table.js') }}"></script>

 <!-- Custom js for this page -->
 <script src="{{ asset('admin-assets/js/dashboard.js') }}"></script>
 <!-- End custom js for this page -->

 <!-- Load Summernote -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

 <!-- Load Select2 -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

 <!-- Dropzone CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
 <!-- Dropzone JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
 <script>
     // $(document).ready(function() {
     //     $('#summernote').summernote({
     //         height: 100
     //     });

     //     $('.select2').select2({
     //         tags: true,
     //         tokenSeparators: [',']
     //     });
     // });

     $(document).ready(function() {
         $('#summernote').summernote({
             height: 100
         });

         $('.select2').select2({
             tags: true,
             tokenSeparators: [',']
         });

         // $('.dropify').dropify(); // Initialize Dropify
     });
 </script>