@extends('layouts.admin')

@section('css')

@endsection

@section('content')

 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Update SMTP Setting')</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Update SMTP Setting')</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.generalsetting.update') }}" class="item-form">
               @csrf
             <div class="row">
                <div class="col-md-6 mb-4">
                    <label  class="form-label mb-1">@lang('Mail Driver')</label> 
                    <div class="input-group my-group">
                        <select class="form-control" name="social">
                            <option {{ $gs->mail_driver=='smtp' ? 'selected':'' }} value="smtp">@lang('SMTP')</option>
                            <option {{ $gs->mail_driver=='sendmail' ? 'selected':'' }} value="sendmail">@lang('SENDMAIL')</option>
                            
                        </select> 
                     
                    </div>
                 </div>
                 <div class="col-md-6 mb-4">
                     <label for="name" class="form-label">@lang('SMTP Host')</label>
                     <input type="text" class="form-control" id="name" name="mail_host" value="{{ $gs->mail_host }}" >
                 </div>
                 <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">@lang('SMTP Port')</label>
                    <input type="text" class="form-control" id="name" name="mail_port" value="{{ $gs->mail_port }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">@lang('Encryption')</label>
                    <input type="text" class="form-control" id="name" name="mail_encryption" value="{{ $gs->mail_encryption }}" >
                </div>
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">@lang('SMTP Username')</label>
                    <input type="text" class="form-control" id="name" name="mail_user" value=" {{ $gs->mail_user  }}" >
                </div>
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">@lang('SMTP Password')</label>
                    <input type="text" class="form-control" id="name" name="mail_pass" value=" {{ $gs->mail_pass  }}" >
                </div>
                <div class="col-md-6 ">
                    <label for="name" class="form-label">@lang('From Email')</label>
                    <input type="text" class="form-control" id="name" name="from_email" value=" {{ $gs->from_email  }}" >
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">@lang('From Name')</label>
                    <input type="text" class="form-control" id="name" name="from_name" value=" {{ $gs->from_name  }}" >
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


   
 
</script>


@endsection