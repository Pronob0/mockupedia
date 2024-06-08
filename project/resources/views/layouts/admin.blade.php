
<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>{{ $gs->website_title }}</title>
      <link rel="icon" href="{{ asset('assets/images/'.$gs->fav) }}" type="image/png">
      {{-- Style link --}}
      <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}"
         rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <link href="{{ asset('assets/admin/css/sb-admin-2.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/admin/css/tagify.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/admin/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">

      

      <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css ') }} ">
      {{-- Style Link End --}}
      @yield('css')
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         @include('includes.admin.sidebar')
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <!-- Topbar -->
               @include('includes.admin.topbar')
               <!--End of Topbar -->
               {{-- Page Content --}}
               @yield('content')
               {{-- Page Content End --}}
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Your Website 2021</span>
                  </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Scroll to Top Button End -->
    
      {{-- Script Link --}}
      <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
      <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
      <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
      
      <script src="{{ asset('assets/admin/js/custom.js') }}"></script> 
      <script src="{{ asset('assets/admin/js/tagify.js') }}"></script>
      <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script> 
      <script src="{{ asset('assets/admin/js/jscolor.min.js') }}"></script>
      <script src="{{ asset('assets/admin/js/fontawesome-iconpicker.js') }}"></script>
      {{-- End of Script Link --}}
      {!!Toastr::message() !!}
      <script>
         @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
         
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif                          
      </script>

<script type="text/javascript">

   if(document.getElementById('nicedit')){
   bkLib.onDomLoaded(function() {
     nicEditors.editors.push(
         new nicEditor().panelInstance(
             document.getElementById('nicedit')
         )
     );
 });
   }

    
   $('#logoutModal').on('show.bs.modal', function (event) {
     var button = $(event.relatedTarget) 
     var data=button.data('href')
   $(this).find('.modal-footer a').attr('href',data);

   })
   </script>  
      @yield('js')
   </body>
</html>