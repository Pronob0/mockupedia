@extends('layouts.admin')

@section('css')


@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Edit Advertisement')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Edit Ads')</h6>

        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('admin.advertisement.update', $advertisement->id) }}" enctype="multipart/form-data" class="item-form">
               @csrf

               
               <img class="h-100 img-fluid mx-auto prv" src="{{ asset('assets/images/ads/',$advertisement->banner) }}" alt="" id="show">
               
             <div class="row ">
                 <div class="col-md-6 mt-4">
                     <label for="company" class="form-label">@lang('Company')</label>
                     <input type="text" class="form-control" id="company" name="company" value="{{$advertisement->company}}" placeholder="Company Name" >
                 </div>

                 <div class="col-md-6 mt-4">
                    <label  class="form-label mb-1">@lang('Add Image')</label>
                     <label class="mt-4 custom-file-label" for="picture">@lang('Choose file')</label>
                     <input class="custom-file-input" type="file" name="banner" accept="image/*" id="picture" >
                 
             </div>
             

                 <div class="col-md-6 mt-4 ">
                    <label for="position" class="form-label">@lang('Banner Position')</label>
                    <select class="form-control" data-toggle="select" name="position" id="position">
                        <option {{$advertisement->position == 'side_banner' ? 'selected' : '' }} value="side_banner">@lang('Side Banner')</option>
                        <option {{$advertisement->position == 'content_banner' ? 'selected' : '' }} value="content_banner">@lang('Content Banner')</option>
                    </select>
                </div>

                <div class="col-md-6 mt-4 ">
                    <label for="type" class="form-label">@lang('Ads Type')</label>
                    <select class="form-control" data-toggle="select" name="type" id="type">
                        <option value="banner">@lang('Banner')</option>
                        
                    </select>
                </div>
                <div class="col-md-6 mt-4">
                    <label for="name" class="form-label">@lang('Status')</label>
                    <select class="form-control" data-toggle="select" name="status" id="status">
                        
                        <option value="1">@lang('Active')</option>
                        <option value="0">@lang('Inactive')</option>
                    </select>
                </div>

                 <div class="col-md-6 mt-4">
                  <label for="link" class="form-label">@lang('Link')</label>
                  <input type="url" class="form-control" id="source" name="link" value="{{$advertisement->link}}">
              </div>

              <div class="col-md-6 mt-4">
                <label for="link" class="form-label">@lang('Start Date')</label>
                <input type="date" class="form-control" id="source" name="start_date" value="">
            </div>

            <div class="col-md-6 mt-4">
                <label for="link" class="form-label">@lang('End Date')</label>
                <input type="date" class="form-control" id="source" name="end_date" value="">
            </div>

            <div class="col-md-6 mt-4">
                <label for="link" class="form-label">@lang('Duration') <small>In second</small></label>
                <input type="number" class="form-control" id="source" name="duration" value="{{$advertisement->duration}}" placeholder="In second">
            </div>

                 


               

             </div>
               <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('admin.blog') }}" class="btn btn-light bg-gradient-info mr-3 text-white">@lang('Back')</a>
                  <button type="submit" class="btn bg-gradient-primary m-0 ms-2 text-white">@lang('Create')</button>
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