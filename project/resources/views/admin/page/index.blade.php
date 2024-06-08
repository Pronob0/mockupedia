@extends('layouts.admin')

@section('css')

<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Pages')</h1>
    <p class="mb-4">@lang('This is the list of Pages.')</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Pages')</h6>
            <a href="{{ route('admin.pages.create') }}" class="btn bg-gradient-primary text-white btn-sm">
                @lang('Create new')
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>@lang('Title')</th>
                            <th>@lang('URL Slug')</th>
                            <th>@lang('Details')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $info)
                        <tr>
    
                            <td data-label="@lang('SL')">
                                {{$loop->iteration}}
                                </td>
                             <td data-label="@lang('Title')">
                               {{$info->title	}}
                             </td>
                             <td data-label="@lang('URL Slug')">
                               {{$info->slug	}}
                             </td>
                             <td data-label="@lang('Details')">{{Str::limit(strip_tags($info->details),40)}}</td>
                             <td data-label="@lang('Language')">
                               {{$info->lang	}}
                             </td>
                             <td data-label="@lang('Actions')">
                                <a class="btn text-white bg-gradient-primary btn-circle btn-sm" href="{{ route('admin.pages.edit', $info->id) }}" ><i class="fas fa-edit"></i>
                                </a>
        
        
                                <a val="{{ route('admin.pages.delete', $info->id) }}" type="button" data-toggle="modal" data-target="#deleteModal" class="btn text-white bg-gradient-danger btn-circle btn-sm del"><i class="fas fa-trash"></i>
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



@include('includes.admin.modal')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-gradient-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Delete Page')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5 class="text-center">@lang('Are you sure to delete this Page?')</h5>
        </div>
        <div class="modal-footer">
            <a href="" class="btn bg-gradient-danger text-white m-0 ms-2" id="delmodal">@lang('Delete')</a>
         </div>
        
      </div>
    </div>
  </div>


@endsection
@section('js')

 <!-- Page level plugins -->
 <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Page level custom scripts -->
 <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>

<script>
 



   $('.del').on('click', function() {
       var url = $(this).attr('val');
       $('#delmodal').attr('href', url);
   });
</script>


@endsection