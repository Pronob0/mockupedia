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
            </div>
            <div class="return ">
                <a class="text-dark" href="{{ route('front.index') }}">Return back</a>
            </div>
      </div>
    </nav>
</div>

<section class="blog my-5">
    <div class="container" style="width: 50%">
        <div class="row">
            <img style="height: 300px" src="{{ asset('assets/images/blog/'.$blog->image) }}" class="img-fluid" alt="">
        </div>
        <div class="row mt-3">
            <h2>{{ $blog->title }}</h2>
        </div>
        <div class="row mt-3">
            <p>
                @php
                    echo $blog->description;
                @endphp
            </p>
        </div>

    </div>
</section>
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