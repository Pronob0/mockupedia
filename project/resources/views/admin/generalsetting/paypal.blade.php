@extends('layouts.admin')

@section('css')



@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Paypal Information')</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Paypal Information')</h6>

        </div>
        <div class="card-body">
            <form  method="POST" action="{{ route('admin.generalsetting.update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 my-2">
                        
                            <label for="clientid" class="form-label">@lang('Client ID')</label>
                            <input type="text" class="form-control" id="clientid" name="client_id" value="{{ $gs->client_id }}" >
                         
                    </div>
                    <div class="col-md-12">
                        
                            <label for="clientsecret" class="form-label">@lang('Client Secret')</label>
                            <input type="text" class="form-control" id="clientsecret" name="client_secret" value="{{ $gs->client_secret }}" >

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


{{-- Category Modal Start--}}

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-gradient-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Blog Category Add')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" method="POST" action="{{ route('admin.blog.categories.store') }}">
            @csrf
            <label for="name" class="form-label">@lang('Name')</label>
            <div class="mb-3">
               <input type="text" class="form-control" id="name" name="name" value=""
                  onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <label class="mt-4"> @lang('Slug')</label>
            <input type="text" class="form-control" id="slug" name="slug" value=""
               onfocus="focused(this)" onfocusout="defocused(this)">
            <div class="d-flex justify-content-end mt-4">
               <button type="submit" id="crt-btn" class="btn text-white bg-gradient-primary m-0 ms-2">@lang('Create')</button>
            </div>
         </form>
        </div>
        
      </div>
    </div>
  </div>

{{-- Category Modal End--}}
@include('includes.admin.modal')
<!-- Delete Modal Start-->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gradient-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Delete Category')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5 class="text-center">@lang('Are you sure to delete this category?')</h5>
          <p class="text-center">@lang('All Your Blogs will be deleted under this category!')</p>
      </div>
      <div class="modal-footer">
          <a href="" class="btn bg-gradient-danger text-white m-0 ms-2" id="delmodal">@lang('Delete')</a>
       </div>
      
    </div>
  </div>
</div>

<!-- Delete Modal End-->


@endsection
@section('js')

 <!-- Page level plugins -->
 <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Page level custom scripts -->
 <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>

<script>
  $('#name').on('keyup', function() {
       var name = $(this).val();
       var slug = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
       $('#slug').val(slug);
   });

   $('#editmodal').on('click', function() {
       var url = $(this).attr('val');
       var name = $(this).attr('cat-name');
       var slug = $(this).attr('cat-slug');
       $('#form').attr('action', url);
       $('#exampleModalLabel').text('Edit Category');
       $('#crt-btn').text('Update');
       $('#name').val(name);
       $('#slug').val(slug);
       $('#categoryModal').modal('show');
   });

   $('.del').on('click', function() {
       var url = $(this).attr('val');
       $('#delmodal').attr('href', url);
   });
</script>


@endsection