@extends('layouts.admin')

@section('css')


@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Update SEO')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Update SEO')</h6>

        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('admin.generalsetting.update') }}" class="item-form">
               @csrf    

            <div class="row">
               <div class="col-md-6">
                  <label for="meta_title" class="form-label">@lang('Meta Title')</label>
                  <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $gs->meta_title }}" >
               </div>

               <div class="col-md-6">
                  <label for="meta_keyword" class="form-label">@lang('Meta Tags')</label>
                  <input class="form-control" id="meta_tag" name='meta_tags[]' value='{{ $gs->meta_tags }}'>
               </div>

               <div class="col-md-12 mt-4">
                  <label for="meta_description" class="form-label">@lang('Meta Description')</label>
                  <textarea class="form-control" id="meta_description" name="meta_description" rows="3" >{{ $gs->meta_description }}</textarea>
               </div>
            </div>
               <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('admin.dashboard') }}" class="btn btn-light bg-gradient-info mr-3 text-white">@lang('Back')</a>
                  <button type="submit" class="btn bg-gradient-primary m-0 ms-2 text-white">@lang('update')</button>
               </div>
            </form>
        </div>
    </div>

</div>



@include('includes.admin.modal')



@endsection
@section('js')


<script>


   var input = document.querySelector('#tag');
    new Tagify(input);
    var inputt = document.querySelector('#meta_tag');
    new Tagify(inputt);

</script>


@endsection