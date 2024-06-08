{{-- status modal --}}
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-gradient-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Change Status')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5 class="text-center">@lang('Are you sure to Change The Status?')</h5>
            <p class="text-center">{{ __("Do you want to proceed?") }}</p>
        </div>
        <div class="modal-footer">
            <a href="" class="btn bg-gradient-danger text-white m-0 ms-2" id="statusmod">@lang('Update')</a>
         </div>
      </div>
    </div>
  </div>

{{-- status modal --}}

