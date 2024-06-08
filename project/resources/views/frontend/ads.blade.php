@extends('layouts.global')

@section('css')
<style>
    .nav-tabs {
   background: #dee2e6;
   padding: 5px;
   border-radius: 35px;
   width: 55%;
}
.nav-link{
    padding: 5px 5px !important;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active
{
    background-color: transparent !important;
    border: none !important;
}
h2{
    font-size:3rem;
    line-height: 1.25;
    font-weight: 700;
    font-family: "Lora";
    color: #8DC63F;

}
.fixed-text{
    opacity: 0.6;
}

</style>

    
@endsection


@section('content')

<div class="body" style="background-color:#F4F7FF">


<div class="header" style="background-color:#F4F7FF">
    <nav class="navbar navbar-expand-lg">
      <div class="container container-width d-flex justify-content-between">
       
            <div class="logo-btn">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                </a>
               
            </div>

            <div class="return ">
                <a class=" btn btn-outline-success" href="#contact">Contact</a>
            </div>
       
      </div>
    </nav>
  </div>


  <section class="blog-section spad p-10 mt-5" id="blog-section" >
    <div class="container container-width">
      <!-- This is Section Header -->
      
      <div class="row d-flex justify-content-between">
        <div class="col-md-7">

            
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="link-tab" data-bs-toggle="tab" data-bs-target="#link" type="button" role="tab" aria-controls="link" aria-selected="true"> 
                    <i class="fas fa-link"></i>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="youtube-tab" data-bs-toggle="tab" data-bs-target="#youtube" type="button" role="tab" aria-controls="youtube" aria-selected="false">
                    <i class="fab fa-youtube"></i>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="facebook-tab" data-bs-toggle="tab" data-bs-target="#facebook" type="button" role="tab" aria-controls="facebook" aria-selected="false">
                    <i class="fab fa-facebook"></i>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="twitter-tab" data-bs-toggle="tab" data-bs-target="#twitter" type="button" role="tab" aria-controls="twitter" aria-selected="false">
                      <i class="fab fa-twitter"></i>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="instagram-tab" data-bs-toggle="tab" data-bs-target="#instagram" type="button" role="tab" aria-controls="instagram" aria-selected="false">
                      <i class="fab fa-instagram"></i>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="linkedin-tab" data-bs-toggle="tab" data-bs-target="#linkedin" type="button" role="tab" aria-controls="linkedin" aria-selected="false">
                      <i class="fab fa-linkedin"></i>
                    </button>
                </li>
              </ul>

              <div class="fixed-text">
                <h2>Promote your</h2>
              </div>

              <div class="tab-content d-flex" id="myTabContent">
                
                <div class="tab-pane fade show active" id="link" role="tabpanel" aria-labelledby="link-tab"><h2>Web site</h2></div>
                <div class="tab-pane fade" id="youtube" role="tabpanel" aria-labelledby="youtube-tab"> <h2>YouTube video</h2> </div>
                <div class="tab-pane fade" id="facebook" role="tabpanel" aria-labelledby="facebook-tab"> <h2>Facebook post</h2> </div>
                <div class="tab-pane fade" id="twitter" role="tabpanel" aria-labelledby="twitter-tab"> <h2>Twitter post</h2> </div>
                <div class="tab-pane fade" id="instagram" role="tabpanel" aria-labelledby="instagram-tab"> <h2>Instagram post</h2> </div>
                <div class="tab-pane fade" id="linkedin" role="tabpanel" aria-labelledby="linkedin-tab"> <h2>LinkedIn page</h2> </div>

                <div class="fixed-text ms-3"> <h2>on</h2> </div>
              </div>

              <div class="fixed-text">
                <h2>Mockupedia</h2>
              </div>

              <div class="text-para ">
                <p>Tap into Mockupedia’s 20 years of audience cultivation and share your web site to our users. Just enter the URL during checkout.</p>
              </div>

              <div class="contact-btn my-5">
                <a href="#contact" class="btn btn-success w-100">Contact us</a>
              </div>
        </div>

        <div class="col-md-4">
            <div class="mobile-image">
                <img class="img-fluid" src="{{ asset('assets/images/mockup.png') }}" alt="">
            </div>
        </div>



       
        
        
     </div>


     {{-- Contact us Form  --}}
    </div>
  </section>

</div>

<section class=" py-5" style="background-color: #ffff">
    <div class="container container-width">
      <h2 class="text-center mb-5">Our Client</h2>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <img src="assets/images/partner/partner1.png" alt="Partner 1" class="img-fluid">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <img src="assets/images/partner/partner2.png" alt="Partner 2" class="img-fluid">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <img src="assets/images/partner/partner3.png" alt="Partner 3" class="img-fluid">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <img src="assets/images/partner/partner4.png" alt="Partner 4" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

<section id="contact" class="contact-section spad p-10 " id="contact-section" style="background-color:#F4F7FF">
    <div class="container container-width">
    <!-- This is Section Header -->
    
    <div class="row d-flex justify-content-between">
        <div class="col-md-12">

            <div class="card my-5 p-4">
                <div class="card-body">
                    <h5 class="card-title mb-5">Contact Us</h5>

                    <form method="POST" action="{{ route('advertisement.store') }}">
                    @csrf
                       <div class="form-group">
                        <label for="my-select">What do you want to do?</label>
                        <select id="my-select" class="form-select mt-2" name="interest" required>

                            <option value="">Please choose one</option>
                            <option value="Advertise a product or service on Mockupedia Dictionary">Advertise a product or service on Mockupedia</option>
                            <option value="Sponsor a word of the day">Sponsor a word of the day</option>
                            <option value="Collaborate on content creation">Collaborate on content creation</option>
                            <option value="Utilize Mockupedia Dictionary's data insights for market research">Utilize Mockupedia's data insights for market research</option>
                            <option value="Other">Other</option>
                        </select>
                       </div>

                     <div class="form-group mt-4">
                        <label for="my-input">Your Budget?</label>
                        <select id="my-select" class="form-select mt-2" name="budget" required>
                            <option value="">Please choose one</option>
                            <option value="Up to $500">Up to $500</option>
                            <option value="$500 - $999">$500 - $999</option>
                            <option value="$1,000 - $4,999">$1,000 - $4,999</option>
                            <option value="$5,000 - $9,999">$5,000 - $9,999</option>
                            <option value="$10,000 - $49,999">$10,000 - $49,999</option>
                            <option value="$50,000 - $99,999">$50,000 - $99,999</option>
                            <option value="$100,000 and above">$100,000 and above</option>
                        </select>
                     </div>

                     <div class="form-group mt-4">
                        <label for="my-input">Name</label>
                        <input id="my-input" class="form-control mt-2" type="text" required name="name" placeholder="Your Name">
                     </div>

                     <div class="form-group mt-4">
                        <label for="my-input">Email</label>
                        <input id="my-input" class="form-control mt-2" type="email" required name="email" placeholder="Your email">
                     </div>

                     <div class="form-group mt-4">
                        <label for="my-input">Website</label>
                        <input id="my-input" required class="form-control mt-2" type="url" name="website" placeholder="Your Website">
                     </div>

                     {{-- textarea --}}
                     <label class="mt-4" for="">Message</label>
                     <div class="form-floating">
                        <textarea class="form-control mt-2" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="message" required></textarea>
                        <label for="floatingTextarea2">Message</label>
                      </div>

                      <button type="submit" name="" id="" class="btn btn-success my-4" >Submit</button>
                    </form>
                </div>
            </div>

        </div>
     </div>

    </div>
    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="{{ route('advertisement') }}" class="nav-link px-2 text-muted">ads</a></li>
          <li class="nav-item"><a href="{{ route('all.donation') }}" class="nav-link px-2 text-muted">donation</a></li>
          @foreach ($pages as $item)
          <li class="nav-item"><a href="{{ route('page',$item->slug) }}" class="nav-link px-2 text-muted">{{ $item->title }}</a></li>
          @endforeach
          
          
        </ul>
        <p class="text-center text-muted">{{ $gs->copyright_text }}</p>
      </footer>
    </div>


@endsection


@section('js')

<script>
 
      $('.donate-btn').on('click', function(){

        var id = $(this).data('val');
        $('#campaign_id').val(id);
        $('#exampleModal').modal('show');
      });
</script>

@endsection