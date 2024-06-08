<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon"  href="https://mockupedia.com/assets/images/logo/logo.png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d0b09411dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css ') }} ">

    @yield('css')

    <title>{{ $gs->website_title }}</title>
  </head>
  <body>

    @yield('content')



    <script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
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
    
     @yield('js')


  </body>
</html>