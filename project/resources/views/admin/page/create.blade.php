@extends('layouts.admin')

@section('css')


@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Add New Page')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Add New Page')</h6>

        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('admin.pages.store') }}"  class="item-form">
               @csrf

             <div class="row">
                 <div class="col-md-12">
                     <label for="name" class="form-label">@lang('Name')</label>
                     <input type="text" class="form-control" id="name" name="title" value="" required placeholder="{{ __('Enter Title') }}">
                 </div>

                <div class="col-md-12 mt-4">
                     <label for="nicedit" class="form-label">@lang('Description')</label>
                     <textarea class="form-control" id="nicedit" name="details" rows="3" ></textarea>
                 </div>
             </div>


           
               <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('admin.pages.all') }}" class="btn btn-light bg-gradient-info mr-3 text-white">@lang('Back')</a>
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


</script>


@endsection