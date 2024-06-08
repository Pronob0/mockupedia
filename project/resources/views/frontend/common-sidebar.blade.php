<div class="col-md-4 " style="">
    <div class="website-title">
      <div class="card mt-3">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="side-title w-50">
              <h4>
                Mockupedia is Written by you.
              </h4>

            </div>
            <div class="side-gif w-50">
              <img class="img-fluid" src="{{ asset('assets/images/'.$gs->gif) }}" alt="">
            </div>
          </div>
          <div class="side-btn my-2">
            <a href="{{ route('user.word.add') }}" class="btn   w-100">Add your Word</a>
          </div>
        </div>
      </div>
     </div>

     <div class="social-share-btn my-2">
     

        <div class="d-flex justify-content-between mb-2">
            {{-- twitter  --}}
            <div class="share-btn me-1">
                <a  href=""><i class="fab fa-twitter me-1"></i>Twitter</a>
            </div>
            <div class="share-btn ms-1">
                <a  href=""><i class="fab fa-facebook me-1"></i>Facebook</a>
            </div>
            {{-- twitter end  --}}
        </div>
        <div class="d-flex justify-content-between">
            {{-- twitter  --}}
            <div class="share-btn me-1">
                <a  href=""><i class="fas fa-hands-helping me-1"></i>Help</a>
            </div>
            <div class="share-btn ms-1">
                <a  href=""><i class="fa-solid fa-message me-1"></i>Subscribe</a>
            </div>
            {{-- twitter end  --}}
        </div>
     </div>
     @php
     $ads = App\Models\Advertisement::where('status', 1)->where('position','side_banner')->inRandomOrder()->first();
     @endphp
      <div class="side-ads sticky-top" id="side-ads">
       <a href="{{ $ads->link }}">
         <img class="img-fluid" src="{{ asset('assets/images/ads/'.$ads->banner) }}" alt="">
         <input type="hidden" class="ads" value="{{ $ads->duration }}">
       </a>
      </div>
  </div>
  <script>
   var duration = document.querySelector('.ads').value;
   var duration = duration * 1000;
     
setTimeout(function(){
 
   document.getElementById("side-ads").style.display = "block";
}, duration);
  </script>