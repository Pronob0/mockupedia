@extends('layouts.global')

@section('css')
    
@endsection


@section('content')

<div class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container container-width d-flex justify-content-between">
       
            <div class="logo-btn">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                </a>
                <button class="btn btn-sm btn-secondary" type="button">Donation</button>
            </div>

            <div class="return ">
                <a class="text-dark" href="{{ route('front.index') }}">Return back</a>
            </div>
       
      </div>
    </nav>
  </div>

  <div class="form-section test  w-100 " style="background-color: rgb(34, 60, 127); position: relative;  height: 80vh;">
    <!-- background image  -->
    <div class="background" style="background-image: url({{ asset('assets/images/donation/'.$data->image) }}); height: 100%; width: 100%; opacity: 0.5; position: relative;background-repeat: no-repeat; background-size:cover">
    </div>

    <div class="card p-2" style="position: absolute; top: 30%; left: 40%; opacity: 1;">
        <div class="card-body">
            <h2 class="card-title text-center fw-bold">{{ $data->title }}</h2>
            <p class="card-text">{{ $data->slogan }}</p>

            <div class="form">
              <form action="{{ route('paypal.submit') }}" method="POST">
                @csrf
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount in USD">
                        <input type="hidden" name="campaign_id" value="{{ $data->id }}" id="campaign_id">
                  <button type="submit" class="btn btn-primary btn-sm mt-2">Donate</button>
                
            </form>
            </div>
        </div>
    </div>
</div>

<div class="content p-4 " style="background-color: #73caf1">
  <div class="container container-width ">
    <p class="text-center" style="font-size: 12px; font-weight:bolder;">CHANGING THE ENDING ONE PERSON AT A TIME</p>
    <h2 class="text-center" style="color:#fff; font-weight:bolder;">TRANSFORMING LIVES</h2>
    @php
    echo $data->description;
    @endphp
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