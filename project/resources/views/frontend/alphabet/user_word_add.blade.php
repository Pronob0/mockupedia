<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable = no" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $gs->website_title }}</title>

    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/d0b09411dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css ') }} ">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link href="{{ asset('assets/admin/css/tagify.css') }}" rel="stylesheet">


</head>
<body class="bg-primary">

    <div class="container container-width p-5">
        
        {{-- header Text --}}
        <div class="row">
            <div class="col-md-12">
                <h1 style="font-weight: bold" class="text-white text-center"><span class="border-bottom py-2">Add Your Word</span> </h1>
               
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <a href="{{ route('front.index') }}" class="btn btn-dark me-md-2 text-white" type="button">Back</a>
              </div>
            
        </div>
        

        <div class="card my-5">
            <div class="card-body p-4">
                <div class="headline mb-3">
                    <p>All the definitions on Mockupedia were written by people just like you. Now's your chance to add your own!</p>
                </div>
                <p>Please review Mockupedia's <a href="">content guidelines</a>  before writing your definition. Here's the short version: <b> Share definitions that other people will find meaningful and never post hate speech or people’s personal information.</b></p>


                <div class="word-form">
                    <form method="POST" action="{{ route('user.word.store') }}">
                        @csrf

                        <div class="input-group input-group-lg mb-3">
                            
                            <input name="word" style="padding: 1.5rem 1rem; border-color:rebeccapurple" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Your Word">
                          </div>
                          <p>Write for a large audience. Lots of people will read this, so give some background information.</p>
                          <p>Don't name your friends. We'll reject inside jokes and definitions naming non-celebrities.</p>
                          
                            
                            <div class="form-group mb-3">
                                <textarea id="my-textarea" class="form-control" name="definition" rows="5" placeholder="Type Your Definition herer..."></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <textarea id="my-textarea" class="form-control" name="example" rows="3" placeholder="Type Your Example here....."></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="my-input">Add some Tag here</label>
                                <input class="form-control " id="tag" name='tags[]' value=''>
                            </div>

                            <div class="form-group mb-4">
                                <label for="my-input">Your name</label>
                                <input id="my-input" class="form-control" type="text" name="username" placeholder="Type Your Name here">
                            </div>

                            <button type="submit" class="btn btn-warning w-100 p-3">Submit!</button>       
                    </form>
                </div>


               
            </div>
        </div>

    </div>
 {{-- back button  --}}
 <script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}" ></script>
 <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}" ></script>
 <script src="{{ asset('assets/admin/js/tagify.js') }}"></script>
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
<script>
 var input = document.querySelector('#tag');
 new Tagify(input);

 $('#search').on('keyup',function(){

$('.search-class').removeClass('d-none');
      var search = $(this).val();
      if(search.length > 0){
        $.ajax({
          url: "{{ route('search') }}",
          type: "GET",
          data: {search:search},
          success:function(response){
            $('#searchlist').html(response);
          }
        });
      }else{
        $('#searchlist').html('');
      }
    });
 </script>
</body>
</html>