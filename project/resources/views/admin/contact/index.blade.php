@extends('layouts.admin')

@section('css')

@endsection

@section('content')

 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Update Contact Info')</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Update Contact Info')</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact.update', $contact->id) }}" class="item-form">
               @csrf
             <div class="row">
                 <div class="col-md-6 mb-4">
                     <label for="name" class="form-label">@lang('Address')</label>
                     <input type="text" class="form-control" id="name" name="location" value="{{ $contact->location }}" >
                 </div>
                 <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">@lang('Phone')</label>
                    <input type="text" class="form-control" id="name" name="phone" value="{{ $contact->phone }}">
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">@lang('Email')</label>
                    <input type="email" class="form-control" id="name" name="email" value="{{ $contact->email }}" >
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">@lang('Website')</label>
                    <input type="url" class="form-control" id="name" name="website" value=" {{ $contact->website  }}" >
                </div>
             </div>
               <div class="d-flex justify-content-end mt-4">
                  
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



        $('#name').on('keyup', function() {
       var name = $(this).val();
       var slug = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
       $('#slug').val(slug);
   });
   $('#icon').on('change', function() {
       var icon = $(this).find('input').val();
       
       $('.icon').val(icon);
   });
   

   
 
</script>


@endsection