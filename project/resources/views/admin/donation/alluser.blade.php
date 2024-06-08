@extends('layouts.admin')

@section('css')

<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Donated Users')</h1>
    <p class="mb-4">@lang('This is the list of Donated Users')</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Donated Users')</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>@lang('Sl')</th>
                            <th>@lang('txnid')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Paypal')</th>
                            <th>@lang('Options')</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($datas as $data)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $data->txnid }}</td>
                          <td>{{ $data->amount }}</td>
                            <td>@lang('Paypal')</td>
                          <td>
                            <a val="{{ route('admin.donation.user.delete', $data->id) }}" type="button" data-toggle="modal" data-target="#deleteModal" class="btn text-white bg-gradient-danger btn-circle btn-sm del"><i class="fas fa-trash"></i>
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


{{-- Category Modal End--}}
@include('includes.admin.modal')
<!-- Delete Modal Start-->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gradient-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Delete Data')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5 class="text-center">@lang('Are you sure to delete this Data?')</h5>
          
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


   $('.del').on('click', function() {
       var url = $(this).attr('val');
       $('#delmodal').attr('href', url);
   });
</script>


@endsection