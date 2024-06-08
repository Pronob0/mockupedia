
@extends('layouts.admin')

@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Change Password')</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Change Password')</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.changepass.update') }}" class="item-form" enctype="multipart/form-data">
               @csrf
             <div class="row">
               
                <div class="col-md-12 mt-4">
                    <label for="website_title" class="form-label">@lang('Current Password')</label>
                    <input type="password" class="form-control"  name="cpass" value="" required="">
                </div>

                <div class="col-md-12 mt-4">
                    <label for="website_title" class="form-label">@lang('New Password')</label>
                    <input type="password" class="form-control"  name="newpass" value="" required="">
                </div>

                <div class="col-md-12 mt-4">
                    <label for="website_title" class="form-label">@lang('Re-Type Password')</label>
                    <input type="password" class="form-control"  name="renewpass" value="" required="">
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

@endsection