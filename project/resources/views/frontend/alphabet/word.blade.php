<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable = no" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Urban Dictionary, June 13: Going Orca</title>

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
            @include('frontend.common-sidebar')
            <div class="col-md-8">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-4">
              
                              <div class="d-flex justify-content-between">
                                <div class="title">
                                  <h1 class="card-title word-title">
                                    <a href="">{{ $value->word }}</a>
                                  </h1>
                                </div>
                                <div class="social-share">
                                  <ul class="post-share a2a_kit a2a_kit_size_32 a2a_default_style" style="line-height: 32px;">
                                   
                                    <li><a class="a2a_button_facebook"></a></li>
                                    <li><a class="a2a_button_twitter"></a></li>
                                   
                                </ul>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
              
                                </div>
                              </div>
                              
              
                              <div class="content">
                                <div class="definition my-4  w-75">
                                  <p> @php
                                    $array = DB::table('admin_words')->select('word')->where('status', '1')->get();
                                    
                                    
                                    $string = $value->definition;
            
                                    foreach ($array as $element) {
                                        
                                        if (str_contains($string, $element->word)) {
                                            
                                            $url = route('alphabet.word', $element->word);
                                            $string = str_replace($element->word, "<a class='pro-link' href=$url><b>$element->word</b></a>", $string);
                                        }
                                    }
                                
                                @endphp
                                {!! $string !!}</p>
                                </div>
                
                                <div class="word-example mb-2 w-75">
                                  <p>@php
                                    $array = DB::table('admin_words')->select('word')->where('status', '1')->get();
                                    
                                    
                                    $string = $value->example;
            
                                    foreach ($array as $element) {
                                        
                                        if (str_contains($string, $element->word)) {
                                            
                                            $url = route('alphabet.word', $element->word);
                                            $string = str_replace($element->word, "<a class='pro-link' href=$url><b>$element->word</b></a>", $string);
                                           
                                        }
                                    }
                                
                                @endphp
                                {!! $string !!}</p>
                                </div>
                
                                <div class="contributor mb-2 w-75">
                                 <p>by <a href="">{{ $value->username }}</a> {{ $value->created_at->format('j F, Y') }}</p> 
                                </div>
                              </div>
              
                               <div class="button-section my-3 d-flex justify-content-between">
                                <div class="thumbs d-flex">

                                  <button data-href="{{ route('thumbsup',$value->id) }}" class="btn  thumbsup"><i class="fa-solid fa-thumbs-up"></i><span class="thumbsup-count mx-2" style="font-size: 12px">{{ $value->like }}</span></button>
                                </div>
                                <div class="flag-btn">
                                    <img class="img-fluid" style="width:100px; height:100px" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                                </div>
                              </div>
                              
                              
                            </div>
              
                            <div class="card-footer word-footer text-center py-3">
                              <a href="">Get the <span class="p-1">muscle mommy</span>  mug</a>
                            </div>
                          </div>
              
                          <div class="publish-btn mt-4 text-center">
                            <a href="">Publicize your YouTube video  on Urban Dictionary in just 3 clicks</a>
                          
                          </div>
              
                          <!-- second ads -->
                           

                         @php
                              $ads = App\Models\Advertisement::where('status', 1)->where('position','content_banner')->inRandomOrder()->first();

                            
                         @endphp

                         <div class="secondad-ads my-4" >
                          <div class="card">
                            <div class="card-body" style="height: 250px;">
                              



                              <a href="javascript:;" data-val="{{ $ads->link }}" class="click-ads" id="{{ $ads->id }}">
                                <img style="height: 100%; width:100%" class="img-fluid content-image" src="{{ $ads != null ?  asset('assets/images/ads/'.$ads->banner) : '' }}" alt="">
                              </a>
                            
                            </div>
                          </div>
                        </div>
                        

                    </div>
                </div>
            </div>

           <!-- sidebar  -->

          
     
          </div>
        </div>
      </div>

      <script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}" ></script>
      <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}" ></script>
      <script>

        $('.thumbsup').click(function(){
            var url = $(this).data('href');
            var count = $(this).find('.thumbsup-count').text();
            var newcount = parseInt(count) + 1;
            $(this).find('.thumbsup-count').text(newcount);
            
              
            $.ajax({
              url:url,
              data:{
                _token:"{{ csrf_token() }}"
                },
              type:'POST',
              success:function(data){

                
              }
            });
          });
       

        
        $(document).on('click','.ajathumbdown',function(){
          var url = $(this).data('href');
            var count = $(this).find('.thumbsdown-count').text();
            var newcount = parseInt(count) + 1;
            $(this).find('.thumbsdown-count').text(newcount);
            $(this).addClass('upactive');
            

            $.ajax({
              url:url,
              data:{
                _token:"{{ csrf_token() }}"
                },
              type:'POST',
              success:function(data){
                $('.thumbs').html(data);

              }
            });

        });

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