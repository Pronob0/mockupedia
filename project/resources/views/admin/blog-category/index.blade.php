@extends('layouts.admin')

@section('css')

<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Blog Category')</h1>
    <p class="mb-4">@lang('This is the list of blog categories.')</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Blog category')</h6>
            <button type="button" class="btn bg-gradient-primary text-white btn-sm" data-toggle="modal" data-target="#categoryModal">
                @lang('Add Category')
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>@lang('Sl')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Slug')</th>
                            <th>@lang('Options')</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $data)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $data->name }}</td>
                          <td>{{ $data->slug }}</td>
                          <td>

                            <a id="editmodal"  type="button" data-toggle="modal" data-target="#categoryModal" class="btn text-white bg-gradient-primary btn-circle btn-sm" val="{{ route('admin.blog.categories.update', $data->id) }}" cat-name="{{ $data->name }}" cat-slug="{{ $data->slug }}"><i class="fas fa-edit"></i>
                            </a>

                            <a val="{{ route('admin.blog.categories.delete', $data->id) }}" type="button" data-toggle="modal" data-target="#deleteModal" class="btn text-white bg-gradient-danger btn-circle btn-sm del"><i class="fas fa-trash"></i>
                            </a>
                          </td> 
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
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