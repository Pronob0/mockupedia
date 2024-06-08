@extends('layouts.admin')

@section('css')

<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Home Banner Update')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Home Banner Update')</h6>

        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('admin.home.banner.update',$banner->id) }}" enctype="multipart/form-data" class="item-form">
               @csrf

               
               <img class="h-100 img-fluid mx-auto prv" src="{{ $banner->banner_image ? asset('assets/images/'.$banner->banner_image):'' }}" alt="" id="show">
               
             <div class="row">
                <div class="col-md-6">
                    <label for="myname" class="form-label">@lang('Header Subtitle')</label>
                    <input type="text" class="form-control" id="myname" name="header_subtitle" value="{{ $banner->header_subtitle }}" >
                </div>
                <div class="col-md-6 mt-2">
                    <label  class="form-label mb-1">@lang('Add Background')</label>
                     <label class="mt-4 custom-file-label" for="picture">@lang('Choose file')</label>
                     <input class="custom-file-input" type="file" name="banner_image" accept="image/*" id="picture" >
                 
             </div>
             <div class="col-md-6 mt-4">
                <label for="birthdate" class="form-label">@lang('Header title')</label>
                <input type="text" class="form-control" id="birthdate" name="header_title" value="{{ $banner->header_title }}" >
            </div>
            <div class="col-md-6 mt-4">
                <label for="header_profession" class="form-label">@lang('Header Profession')</label>
                <input type="text" class="form-control" id="header_profession" name="header_profession" value="{{ $banner->header_profession }}" >
            </div>
           
               <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('admin.dashboard') }}" class="btn btn-light bg-gradient-info mr-3 text-white">@lang('Back')</a>
                  <button type="submit" class="btn bg-gradient-primary m-0 ms-2 text-white">@lang('Update')</button>
               </div>
            </form>
        </div>
    </div>

</div>



@include('includes.admin.modal')



@endsection
@section('js')


<script>
  $('#name').on('keyup', function() {
       var name = $(this).val();
       var slug = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
       $('#slug').val(slug);
   });

   var input = document.querySelector('#tag');
new Tagify(input);
var inputt = document.querySelector('#meta_tag');
new Tagify(inputt);

        $('#picture').change(function(){

        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
        // The file's text will be printed here
        $("#show").attr('src',e.target.result);
        console.log(e.target.result)
        };

        reader.readAsDataURL(file);

        });



   $('.del').on('click', function() {
       var url = $(this).attr('val');
       $('#delmodal').attr('href', url);
   });
</script>


@endsection