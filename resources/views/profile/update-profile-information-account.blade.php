@php 
  $fade = "fade";
  if($errors->any()){
      $fade = "active";
  }elseif($active == "active"){
      $fade = "active";
  }
@endphp
<div class="tab-pane {{ $fade }}" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
    <form wire:submit.prevent="updateProfileInformation" novalidate>
        <div class="row">
            <div class="col-12">
               @if($active)
                  <x-alert-session message="Your info account has been updated to new data"/>
                @endif
                <div class="form-group">
                    <label for="accountTextarea">Bio</label>
                    <textarea class="form-control" id="accountTextarea" rows="3" wire:model.defer="dataUser.bio" placeholder="Your Bio data here..."></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="account-birth-date">Birth date</label>
                        <input type="text" wire:model.defer="dataUser.birth_day" class="form-control" required placeholder="Birth date">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="accountSelect">City</label>
                    <input type="text" wire:model.defer="dataUser.city" class="form-control" required placeholder="City">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="languageselect2">Languages</label>
                    <input type="text" wire:model.defer="dataUser.language" class="form-control" required placeholder="Language">
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