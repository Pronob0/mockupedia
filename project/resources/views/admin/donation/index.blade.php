@extends('layouts.admin')

@section('css')


@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Edit Donation')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Edit Donation')</h6>

        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('admin.donation.update') }}" enctype="multipart/form-data" class="item-form">
               @csrf
               <img class="h-100 img-fluid mx-auto prv" src="{{ $data->image ? asset('assets/images/donation/'.$data->image): asset('assets/images/no-image.png') }}" alt="" id="show">
               
             <div class="row">
                 <div class="col-md-6 mt-3">
                     <label for="name" class="form-label">@lang('Title')</label>
                     <input type="text" class="form-control" id="name" name="title" value="{{ $data->title }}" >
                 </div>

                 <div class="col-md-6 mt-3">
                  <label for="name" class="form-label">@lang('Slogan')</label>
                  <input type="text" class="form-control" id="name" name="slogan" value="{{ $data->slogan }}" >
              </div>

                 <div class="col-md-6 mt-4">
                    <label  class="form-label mb-1">@lang('Add Image')</label>
                     <label class="mt-4 custom-file-label" for="picture">@lang('Choose file')</label>
                     <input class="custom-file-input" type="file" name="image" accept="image/*" id="picture" >
                 
             </div>

                 <div class="col-md-6 mt-4">
                     <label for="date" class="form-label">@lang('End Date')</label>
                     <input type="date" class="form-control" id="date" name="end_date" value="{{ $data->end_date }}" >
                 </div>

                <div class="col-md-12 mt-4">
                     <label for="nicedit" class="form-label">@lang('Description')</label>
                     <textarea class="form-control" id="nicedit" name="description" rows="3" >{{ $data->description }}</textarea>
                 </div>
             </div>

               <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('admin.donation.all') }}" class="btn btn-light bg-gradient-info mr-3 text-white">@lang('Back')</a>
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