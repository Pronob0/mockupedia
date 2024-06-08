<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable = no" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $gs->website_title }}</title>

    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/d0b09411dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
        }
        .pagination li.page-item{
            margin: 0 5px;  
        }

    </style>

</head>
<body>


    {{-- header section  --}}
    
    @include('partial.header')

    {{-- header --}}

    {{-- main section  --}}
     <!-- main content -->
     <div class="word-section">
        <div class="container container-width">
          <div class="firstad-section" style="height: 250px;">
          </div>
  
          <div class="row d-flex">
            
            <div class="col-md-8">
                <div class="card p-4 filter-alpabet ">
                    <div class="card-title">
                        <h3 >Words In "{{ $slug }}"</h3>
                    </div>

                    @if (count($filterword) == 0)
                    <h3 class="text-center">No Words Found</h3>
                    @else
                    
                    @foreach (array_chunk($filterword,3) as $chunked)

                    <div class="row d-flex justify-content-between my-2 new">
                        @foreach ($chunked as $value)
                        <div class="col-md-4">
                            <a href="{{ route('alphabet.word',$value) }}">{{ $value }}</a>
                        </div>
                        @endforeach

                    </div>
                    @endforeach

                    @endif
                </div>
                <div aria-label="Pagination" class="pagination text-xl text-center" role="navigation">
                    {{ $words->links()  }}
                </div>
               
            </div>
            
    
  
           <!-- sidebar  -->

           
           @include('frontend.common-sidebar')
     
          </div>
        </div>
      </div>

      <script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}" ></script>
      <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}" ></script>
      <script>
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