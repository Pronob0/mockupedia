@extends('layouts.admin')

@section('css')

<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Advertisement')</h1>
    <p class="mb-4">@lang('This is the list of Advertisement.')</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Advertisement')</h6>
            <a href="{{ route('admin.advertisement.create') }}" class="btn bg-gradient-primary text-white btn-sm">
                @lang('Add new Ads')
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>@lang('Sl')</th>
                            <th>@lang('Image')</th>
                            <th>@lang('Company')</th>
                            <th>@lang('position')</th>
                            <th>@lang('click')</th>
                            <th>@lang('status')</th>
                            <th>@lang('Options')</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($advertisement as $ads)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>
                            <img src="{{ asset('assets/images/ads/'.$ads->banner) }}" alt="" width="100px">
                          </td>
                          <td>{{ $ads->company }}</td>
                            <td>{{ $ads->position }}</td>
                            <td>{{ $ads->click }}</td>

                            <td>
                                @if ($ads->status == 1)
                                    <span class="badge badge-success">@lang('Active')</span>
                                @else
                                    <span class="badge badge-danger">@lang('Inactive')</span>
                                @endif
                          <td>

                            <a class="btn text-white bg-gradient-primary btn-circle btn-sm" href="{{ route('admin.advertisement.edit', $ads->id) }}" ><i class="fas fa-edit"></i>
                            </a>


                            <a val="{{ route('admin.advertisement.delete', $ads->id) }}" type="button" data-toggle="modal" data-target="#deleteModal" class="btn text-white bg-gradient-danger btn-circle btn-sm del"><i class="fas fa-trash"></i>
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
          <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Delete Blog')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5 class="text-center">@lang('Are you sure to delete this Blog?')</h5>
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