<div class="header py-3">
       <nav class="navbar navbar-expand-lg">
         <div class="container container-width">
           <a class="navbar-brand" href="#">
               <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon text-light"><i class="fa-solid fa-bars"></i></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav">
               <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="{{ route('front.index') }}">Home</a>
               </li>
               <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Browse
                     </a>

                     <ul class="dropdown-menu p-3" aria-labelledby="navbarDropdownMenuLink">
                            
                     <div class="d-flex">
                        <li><a class="dropdown-item" href="{{ route('alphabet','A') }}">A</a></li>
                        <li><a class="dropdown-item" href="{{ route('alphabet','B') }}">B</a></li>
                        <li><a class="dropdown-item" href="{{ route('alphabet','C') }}">C</a></li>
                        <li><a class="dropdown-item" href="{{ route('alphabet','D') }}">D</a></li>
                        <li><a class="dropdown-item" href="{{ route('alphabet','E') }}">E</a></li>
                     </div>
                     <div class="d-flex">
                         <li><a class="dropdown-item" href="{{ route('alphabet','F') }}">F</a></li> 
                         <li><a class="dropdown-item" href="{{ route('alphabet','G') }}">G</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','H') }}">H</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','I') }}">I</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','J') }}">J</a></li> 
                     </div>
                     <div class="d-flex">
                         <li><a class="dropdown-item" href="{{ route('alphabet','K') }}">K</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','L') }}">L</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','M') }}">M</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','N') }}">N</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','O') }}">O</a></li>
                     </div>
                     <div class="d-flex">
                         <li><a class="dropdown-item" href="{{ route('alphabet','P') }}">P</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','Q') }}">Q</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','R') }}">R</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','S') }}">S</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','T') }}">T</a></li>
                     </div>
                     <div class="d-flex">
                         <li><a class="dropdown-item" href="{{ route('alphabet','U') }}">U</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','V') }}">V</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','W') }}">W</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','X') }}">X</a></li>
                         <li><a class="dropdown-item" href="{{ route('alphabet','Y') }}">Y</a></li>
                     </div>
                     <div class="d-flex">
                         <li><a class="dropdown-item" href="{{ route('alphabet','Z') }}">Z</a></li>
                     </div>
                      

                     </ul>

              
                   </li>

                   
                   
               <li class="nav-item">
                 <a class="nav-link" href="{{ route('all.donation') }}">Donation</a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="{{ route('blog') }}">Blog</a>
              </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{ route('advertisement') }}">Advertise</a>
               </li>
               
             </ul>
           </div>
         </div>
       </nav>
 
       <!-- search box menubar -->
       <div class="container container-width">
         <form action="{{ route('front.index') }}" method="GET" class="container-fluid" >

           <div class="input-group">
             <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
             <input type="text" class="form-control py-2" name="search" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="search">
             <div class="menu-icon ms-2">
              <a href="{{ route('user.word.add') }}"><span class="text-white"><i class="fa-solid fa-plus"></i></span></a> 
               <span class="text-white"><i class="fa-solid fa-user"></i></span>
             </div>
           </div>
         </form>
    
          {{-- ul li a  --}}
  
        <div class="container mt-1">

            <ul  style="background: #e4e4e4;list-style:none; width:85%; line-height: 2;" class="py-2 search-class d-none" style="margin-left:10%; width:60%" id="searchlist">
              
             
            </ul>
      
        </div>




       </div>
       <!-- search box menubar -->
     </div>

     <script>


     
   

     </script>