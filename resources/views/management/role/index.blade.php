<x-dashboard-layout>
    <x-slot name="vendor_style">
      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    </x-slot>
    
    <x-slot name="content_header">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Data Series</h2>
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ redirect()->back() }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Mangenent Series
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            <a href="#" data-toggle="modal" data-target="#create-series" class="btn btn-outline-primary">Create new series</a>
        </div>
      </div>
    </x-slot>
    
      <section id="column-selectors">
        <div class="row">
          <div class="col-12">
            <x-alert-session :message="session()->get('success')"/>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Management Data Series</h4>
              </div>
              <div class="card-content">
                <div class="card-body card-dashboard">
                  <p class="card-text">All of the data export buttons have a exportOptions option which can be used to specify information about what data should be exported and how. The options given for this parameter are passed directly to the buttons.exportData() method to obtain the required data.
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Title</th>
                          <th>Link Icon</th>
                          <th>Count Courses</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach($series as $serie)
                        <tr class="justify-items-center">
                          <td>{{ $no++ }}</td>
                          <td>{{ $serie->title }}</td>
                          <td>{{ $serie->url_icon }}</td>
                          <td>{{ $serie->courses->count() }} course</td>
                          <td>{{ $serie->created_at->diffForHumans() }}</td>
                          <td class="d-flex">
                            <a href="#" 
                               id="button_update" 
                               data-toggle="modal" 
                               data-target="#update-series"
                               data-id="{{ $serie->id }}"
                               data-title="{{ $serie->title }}"
                               data-url="{{ $serie->url_icon }}">
                            <i class="fa fa-edit"></i></a>
                            <form class="form-delete" action="{{ route('administrator.destroy.series', $serie->slug) }}" method="POST">
                              @csrf
                              @method('DELETE')
                                <a href="#"><i class="fa fa-trash mx-1 swall-delete" data-title="{{ $serie->title }}"></i></a>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>NO</th>
                          <th>Title</th>
                          <th>Link Icon</th>
                          <th>Count Courses</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Modal Begin Create -->
      <div class="modal fade text-left" id="create-series" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Create Series</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('administrator.store.series') }}" method="POST">
                  @csrf
                    <div class="modal-body">
                        <label>Title: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Title" name="title" class="form-control">
                        </div>

                        <label>Link Icon: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Link Icon" name="url_icon" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End Creare -->
    
    <!-- Modal Begin Update -->
      <div class="modal fade text-left" id="update-series" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Update Series</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('administrator.update.series') }}" method="POST">
                  @csrf
                  @method('PATCH')
                    <div class="modal-body">
                        <input type="hidden" id="id_create" name="id">
                        <label>Title: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Title" id="title_create" name="title" class="form-control">
                        </div>

                        <label>Link Icon: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Link Icon" id="url_icon_create" name="url_icon" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End Update -->
    
    <x-slot name="vendor_script">
      <script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
      <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    </x-slot>
    
    <x-slot name="page_script">
      <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    </x-slot>
</x-dashboard-layout>