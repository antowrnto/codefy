@php 
  $fade = "fade";
  if($errors->any()){
      $fade = "active";
  }elseif($active ?? '' == "active"){
      $fade = "active";
  }
@endphp
<div class="tab-pane {{ $fade }} " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
    <form wire:submit.prevent="updatePassword" novalidate>
        <div class="row">
          <div class="col-12">
            @if($active ?? '')
              <x-alert-session message="Your password has been updated to new password"/>
            @endif
          </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="current_password">Old Password</label>
                        <input type="password" wire:model.defer="state.current_password" autocomplete="current-password" class="form-control" id="current_password" required placeholder="Old Password">
                        <x-jet-input-error for="current_password" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="password">New Password</label>
                        <input type="password" wire:model.defer="state.password" autocomplete="new-password" id="password" class="form-control" placeholder="New Password">
                        <x-jet-input-error for="password"/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="password_confirmation">Retype New
                            Password</label>
                        <input type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password" class="form-control" required id="password_confirmation" placeholder="Confirm Password">
                        <x-jet-input-error for="password_confirmation"/>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                    changes</button>
                <button type="reset" class="btn btn-outline-warning">Cancel</button>
            </div>
        </div>
    </form>
</div>