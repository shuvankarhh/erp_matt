 <!-- bundle -->
 @yield('script')
 <!-- App js -->
 @yield('script-bottom')
 <script>
     window.showModal = async () => {
         const modalElement = document.getElementById('generalModal');
         const modal = new bootstrap.Modal(modalElement);
         modal.show();
     };
 </script>
