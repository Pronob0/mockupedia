
@extends('layouts.admin')

@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Update GeneralSetting')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Update GeneralSetting')</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.generalsetting.update') }}" class="item-form" enctype="multipart/form-data">
               @csrf
               <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <img class="h-100 img-fluid mx-auto prv" src="{{ asset('assets/images/'.$gs->fav) }}" alt="" id="show">
                </div>
                <div class="col-md-6">
                    <img class="h-100 img-fluid mx-auto prv" src="{{ asset('assets/images/'.$gs->gif) }}" alt="" id="show2">
                </div>
               </div>
               
             <div class="row">
                
                <div class="col-md-6 mt-4">
                    <label  class="form-label mb-1">@lang('Favicon')</label>
                     <label class="mt-4 custom-file-label" for="picture">@lang('Choose file')</label>
                     <input class="custom-file-input" type="file" name="fav" id="picture" >
             </div>

             <div class="col-md-6 mt-4">
                <label for="website_title" class="form-label">@lang('Website Title')</label>
                <input type="text" class="form-control" id="website_title" name="website_title" value="{{ $gs->website_title }}" >
            </div>

             <div class="col-md-6 mt-4 mb-5">
                <label for="copyright_text" class="form-label">@lang('Copyright Text')</label>
                <input type="text" class="form-control" id="copyright_text" name="copyright_text" value="{{ $gs->copyright_text }}" >
            </div>

            <div class="col-md-6 mt-4">
                <label  class="form-label mb-1">@lang('Gif')</label>
                 <label class="mt-4 custom-file-label" for="picture">@lang('Choose file')</label>
                 <input class="custom-file-input" type="file" name="gif" id="picture2" >
         </div>

             </div>
             
               <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('admin.blog') }}" class="btn btn-light bg-gradient-info mr-3 text-white">@lang('Back')</a>
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

        $('#picture2').change(function(){

var file = event.target.files[0];
var reader = new FileReader();

reader.onload = function(e) {
// The file's text will be printed here
$("#show2").attr('src',e.target.result);
console.log(e.target.result)
};

reader.readAsDataURL(file);

});
</script>


@endsection