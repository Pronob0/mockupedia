@extends('layouts.admin')

@section('css')

<link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('All Words')</h1>
    <p class="mb-4">@lang('This is the list of All Words.')</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('All Words')</h6>
            <button type="button" class="btn bg-gradient-primary text-white btn-sm" data-toggle="modal" data-target="#wordModal">
                @lang('Add Words')
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>@lang('Sl')</th>
                            <th>@lang('word')</th>
                            <th>@lang('definition')</th>
                            <th>@lang('like')</th>
                            <th>@lang('dislike')</th>
                            <th>@lang('status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($adminwords as $data)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $data->word }}</td>
                          <td>{{ $data->definition }}</td>
                            <td>{{ $data->like }}</td>
                            <td>{{ $data->dislike }}</td>
                            <td>
                                @php
                                    $status= $data->status == 1 ? __('Active') : __('Deactive');
                                    $status_sign = $data->status == 1 ? 'success'   : 'danger';
                                @endphp

                                <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-{{ $status_sign }} btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $status }}
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start">
                                    <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item status" data-href="{{ route('admin.words.status',['id1'=> $data->id, 'id2'=>1]) }}">@lang('Active')</a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item status" data-href="{{ route('admin.words.status',['id1'=> $data->id, 'id2'=>0]) }}">@lang('Deactive')</a>
                                    </div>
                                </div>

                            </td>
                          <td>

                            <a   type="button"  class="btn text-white bg-gradient-primary btn-circle btn-sm editmodal" val="{{ route('admin.words.update', $data->id) }}" word-name="{{ $data->word }}" word-example="{{ $data->example }}" word-def="{{ $data->definition }}" word-tag="{{ $data->tags }}"><i class="fas fa-edit"></i>
                            </a>

                            <a val="{{ route('admin.words.delete', $data->id) }}" type="button" data-toggle="modal" data-target="#deleteModal" class="btn text-white bg-gradient-danger btn-circle btn-sm del"><i class="fas fa-trash"></i>
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


{{-- Word Modal Start--}}

<div class="modal fade" id="wordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-gradient-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">@lang('New Word Add')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" method="POST" action="{{ route('admin.words.store') }}">
            @csrf
            <label for="word" class="form-label">@lang('Word')</label>
            <div class="mb-3">
               <input type="text" class="form-control" id="word" name="word" value=""
                   required>
            </div>
            <label class="mt-4"> @lang('Definition')</label>
            <div class="mb-3">
               <textarea class="form-control" id="definition" name="definition" rows="3"></textarea>
            </div>
            <label class="mt-4"> @lang('Example')</label>
            <div class="mb-3">
               <textarea class="form-control" id="example" name="example" rows="3"></textarea>
            </div>
            <label class="mt-4"> @lang('Tags')</label>
            <div class="mb-3">
                <input class="form-control " id="tag" name='tags[]' value=''>
            </div>
            <div class="d-flex justify-content-end mt-4">
               <button type="submit" id="crt-btn" class="btn text-white bg-gradient-primary m-0 ms-2">@lang('Create')</button>
            </div>
         </form>
        </div>
        
      </div>
    </div>
  </div>



    {{-- Word Modal End--}}
    {{-- delete modal start --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header bg-gradient-danger">
            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Delete Word')</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
                <h4 class="text-center">@lang('Are you sure to delete this word?')</h4>
                 <p class="text-center">Do you want to proceed?</p>
            </div>
            <div class="d-flex justify-content-end mt-4 p-4">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">@lang('Close')</button>
                <a href="" id="delmodal" class="btn btn-danger  ml-3">@lang('Delete')</a>
             </div>
          </div>
        </div>
      </div>
    
    {{-- delete modal end --}}

    {{-- status modal start --}}
    @include('includes.admin.modal')
    {{-- status modal end --}}







@endsection
@section('js')

 <!-- Page level plugins -->
 <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Page level custom scripts -->
 <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>

<script>

var input = document.querySelector('#tag');
    new Tagify(input);

  $('#name').on('keyup', function() {
       var name = $(this).val();
       var slug = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
       $('#slug').val(slug);
   });

   $('.editmodal').on('click', function() {
       var url = $(this).attr('val');
       var word = $(this).attr('word-name');
       var def = $(this).attr('word-def');
       var ex = $(this).attr('word-example');
       var tag = $(this).attr('word-tag');
       $('#form').attr('action', url);
       $('#exampleModalLabel').text('Edit Word');
       $('#crt-btn').text('Update');
       $('#word').val(word);
         $('#definition').val(def);
          $('#example').val(ex);
            $('#tag').val(tag);

       $('#wordModal').modal('show');
   });

   $('.del').on('click', function() {
       var url = $(this).attr('val');
       $('#delmodal').attr('href', url);
   });

    $('.status').on('click', function() {
       
         var url = $(this).data('href');
         $('#statusmod').attr('href', url);
    });
</script>


@endsection