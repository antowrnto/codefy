@php 
  $fade = "fade";
  /*if($errors->any()){
      $fade = "active";
  }elseif($active){
      $fade = "active";
  }*/
@endphp
<div class="tab-pane {{ $fade }}" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
    <form wire:submit.prevent="updateProfileInformation" novalidate>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="accountTextarea">Bio</label>
                    <textarea class="form-control" id="accountTextarea" wire:model="bio" rows="3" placeholder="Your Bio data here...">{{ $account['bio'] }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="account-birth-date">Birth date</label>
                        <input type="text" wire:model="birth_day" value="{{ $account['birth_day'] }}" class="form-control birthdate-picker" required placeholder="Birth date" id="account-birth-date">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="accountSelect">Country</label>
                    <select class="form-control" id="accountSelect">
                        <option disabled selected>Select Here</option>
                        <option>USA</option>
                        <option>India</option>
                        <option>Canada</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="languageselect2">Languages</label>
                    <select class="form-control" wire:model="language" id="languageSelect">
                        <option selected>{{ $account['language'] }}</option>
                        <option value="English">English</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Javanese">Javanese</option>
                        <option value="Sundanese">Sundanese</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                        <option value="Russian">Russian</option>
                        <option value="German">German</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Sanskrit">Sanskrit</option>
                    </select>
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