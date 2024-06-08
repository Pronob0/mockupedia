@extends('layouts.admin')

@section('css')


@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Edit Blog')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Edit Blog')</h6>

        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('admin.blog.update',$blog->id) }}" enctype="multipart/form-data" class="item-form">
               @csrf

               
               <img class="h-100 img-fluid mx-auto prv" src="{{ $blog->image ? asset('assets/images/blog/'.$blog->image): asset('assets/images/no-image.png') }}" alt="" id="show">
               
             <div class="row">
                 <div class="col-md-6">
                     <label for="name" class="form-label">@lang('Name')</label>
                     <input type="text" class="form-control" id="name" name="title" value="{{ $blog->title }}" >
                 </div>

                 <div class="col-md-6">
                     <label for="name" class="form-label">@lang('Slug')</label>
                     <input type="text" class="form-control" id="slug" name="slug" value="{{ $blog->slug }}" >
                 </div>

                 <div class="col-md-6 mt-4 ">
                     <label for="name" class="form-label">@lang('Category')</label>
                     <select class="form-control" data-toggle="select" name="category_id" id="category_id">
                         <option value="">@lang('Select Category')</option>
                         @foreach ($categories as $data)
                             <option {{ $data->id==$blog->category_id ? 'selected':'' }} value="{{ $data->id }}">{{ $data->name }}</option>
                         @endforeach
                     </select>
                 </div>

                 <div class="col-md-6 mt-4">
                  <label for="source" class="form-label">@lang('Source')</label>
                  <input type="url" class="form-control" id="source" name="source" value="{{ $blog->source }}">
              </div>

                 <div class="col-md-6 mt-4">
                        <label  class="form-label mb-1">@lang('Add Image')</label>
                         <label class="mt-4 custom-file-label" for="picture">@lang('Choose file')</label>
                         <input class="custom-file-input" type="file" name="image" accept="image/*" id="picture" >
                     
                 </div>

                    <div class="col-md-6 mt-4">
                        <label for="name" class="form-label">@lang('Status')</label>
                        <select class="form-control" data-toggle="select" name="status" id="status">
                            <option {{ $blog->status==1 ? 'selected':'' }} value="1">@lang('Active')</option>
                            <option {{ $blog->status==0 ? 'selected':'' }} value="0">@lang('Inactive')</option>
                        </select>
                    </div>

                 
                <div class="col-md-12 mt-4">
                     <label for="nicedit" class="form-label">@lang('Description')</label>
                     <textarea class="form-control" id="nicedit" name="description" rows="3" >
                        @php
                            echo $blog->description;
                        @endphp
                     </textarea>
                 </div>

                 

               <div class="col-md-12 mt-4">
                  <label for="tags" class="form-label">@lang('Tags')</label>
                  <input class="form-control " id="tag" name='tags[]' value='{{ $blog->tags }}'>
               </div>

               

             </div>

             <div class="mt-4">
               <h6 class="mb-0">@lang('SEO Options')</h6>
               <hr class="horizontal dark my-3">
             </div>
             

            <div class="row">
               <div class="col-md-6">
                  <label for="meta_title" class="form-label">@lang('Meta Title')</label>
                  <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $blog->meta_title }}" >
               </div>

               <div class="col-md-6">
                  <label for="meta_keyword" class="form-label">@lang('Meta Tags')</label>
                  <input class="form-control" id="meta_tag" name='meta_keyword[]' value='{{ $blog->meta_keyword }}'>
               </div>

               <div class="col-md-12 mt-4">
                  <label for="meta_description" class="form-label">@lang('Meta Description')</label>
                  <textarea class="form-control" id="meta_description" name="meta_description" rows="3" >{{ $blog->meta_description }}</textarea>
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