<x-dashboard-layout>
  <x-slot name="vendor_style">
  </x-slot> 
  
  <x-slot name="content_header">
      <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
              <div class="col-12">
                  <h2 class="content-header-title float-left mb-0">Create New Course</h2>
                  <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ Auth::user()->roles[0]->name == 'mentor' ? redirect('/mentor') : redirect('/dashboard') }}">Home</a>
                          </li>
                          <li class="breadcrumb-item"><a href="{{ Auth::user()->roles[0]->name == 'mentor' ? redirect()->route('mentor.management.course') : redirect()->route('administrator.management.course') }}">Managament Course</a>
                          </li>
                          <li class="breadcrumb-item active"><a href="">Create course</a>
                          </li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>
      <!-- <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrum-right">
              
          </div>
      </div> -->
  </x-slot>
  
  <section id="basic-vertical-layouts">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Create new course</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form form-vertical" action="{{ Auth::user()->roles[0]->name == 'administrator' ? route('administrator.store.course') : route('mentor.store.course') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-body">
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="title">Title</label>
                                              <div class="position-relative has-icon-left">
                                                  <input type="text" id="title" class="form-control" name="title" placeholder="Title">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="description">Description</label>
                                              <div class="position-relative has-icon-left">
                                                  <textarea id="description" name="description"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="thumbanil">Thumbanil</label>
                                              <div class="position-relative has-icon-left">
                                                    <input type="file" id="thumbanil" name="thumbnail-image" accept="image/*">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="language">Language</label>
                                              <div class="position-relative has-icon-left">
                                                  <input type="text" id="language" class="form-control" name="language" placeholder="Language">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <button type="submit" id="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                          <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <x-slot name="vendor_script">
   	<script src="https://cdn.tiny.cloud/1/5ka5hc91afz1c8ak7522cne3izlt2gkwf511zb0txine2vlw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  </x-slot>
  <x-slot name="page_script">
    <script>
				
				const inputElement = document.querySelector('input[type="file"]');
     const pond = FilePond.create( inputElement );
  
      FilePond.setOptions({
          server: {
            url: '/upload',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          }
      });
      
      tinymce.init({ 
		      selector: 'textarea',
		      skin: 'oxide-dark', 
		      content_css: 'dark',
		      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		      toolbar_mode: 'floating',
						 
    	});


    </script>
  </x-slot>
</x-dashboard-layout>