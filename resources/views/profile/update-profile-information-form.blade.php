
<div class="tab-pane active" id="account-vertical-general" role="tabpanel" aria-labelledby="account-pill-general" aria-expanded="true">
  <form wire:submit.prevent="updateProfileInformation" novalidate>
    @csrf
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
    <div x-data="{photoName: null, photoPreview: null}" class="media">
        <div x-show="! photoPreview">
            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded mr-75" height="64" width="64">
        </div>
        <div class="media-body mt-75">
            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload" x-on:click.prevent="$refs.photo.click()">Upload new photo</label>
                <input type="file" id="account-upload" hidden
                      wire:model="photo"
                      x-ref="photo"
                      x-on:change="
                              photoName = $refs.photo.files[0].name;
                              const reader = new FileReader();
                              reader.onload = (e) => {
                                  photoPreview = e.target.result;
                              };
                              reader.readAsDataURL($refs.photo.files[0]);
                      ">
                @if ($this->user->profile_photo_path)
                  <button class="btn btn-sm btn-outline-warning ml-50" wire:click="deleteProfilePhoto">Delete Photo</button>
                @endif
            </div>
            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                    size of
                    800kB</small></p>
        </div>
        <div x-show="photoPreview">
            <span class="rounded mr-75" height="64" width="64"
                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div>
    </div>
    @endif
    <hr>
        <div class="row">
          <div class="col-12">
            @if($messageSend)
              <x-alert-session message="Your profile has been updated to new data"/>
            @endif
          </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" placeholder="Name" wire:model.defer="state.name" required>
                        <x-jet-input-error for="name"/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="email">E-mail <span class="text-danger">*</span></label>
                        <input type="email" disabled class="form-control" id="email" placeholder="Email" wire:model.defer="state.email" required>
                        <x-jet-input-error for="email"/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" wire:model.defer="account.username">
                        <x-jet-input-error for="username"/>
                    </div>
                </div>
            </div>
            @if(!Auth::user()->email_verified_at)
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="mb-0">
                        Your email is not confirmed. Please check your inbox.
                    </p>
                    <a href="#" class="text-primary">Send email verification</a>
                </div>
            </div>
            @endif
            <div class="col-12">
                <div class="form-group"> 
                    <label for="school">School</label>
                    <input type="text" class="form-control" id="school" wire:model.defer="account.school" placeholder="School name">
                    <x-jet-input-error for="school"/>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button wire:loading.attr="disabled" wire:target="photo" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                    changes</button>
                <button type="reset" class="btn btn-outline-warning">Cancel</button>
            </div>
        </div>
    </form>
</div>