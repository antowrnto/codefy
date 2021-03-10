<x-dashboard-layout>
    <x-slot name="vendor_style">
      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    </x-slot>
    
    <x-slot name="content_header">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Data course</h2>
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ redirect()->back() }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Mangenent course
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            <a href="#" data-toggle="modal" data-target="#create-course" class="btn btn-outline-primary">Create new course</a>
        </div>
      </div>
    </x-slot>
    
      <section id="column-selectors">
        <div class="row">
          <div class="col-12">
            <x-alert-session :message="session()->get('success')"/>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Management Data course</h4>
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
                          <th>Language</th>
                          <th>Program Language</th>
                          <th>Pricing</th>
                          <th>Dificulty</th>
                          <th>Duration</th>
                          <th>Series</th>
                          <th>Mentor</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach($courses as $course)
                        <tr class="justify-items-center">
                          <td>{{ $no++ }}</td>
                          <td>{{ $course->title }}</td>
                          <td>{{ $course->language }}</td>
                          <td>{{ $course->programming_language }}</td>
                          <td>{{ $course->pricing }}</td>
                          <td>{{ $course->dificulty }}</td>
                          <td>{{ $course->duration }}</td>
                          <td>{{ $course->series->title }}</td>
                          <td>{{ $course->mentor->name }}</td>
                          <td>{{ $course->created_at->diffForHumans() }}</td>
                          <td class="d-flex">
                            <a href="#"><i class="fa fa-edit"></i></a>
                            <a href="#"><i class="fa fa-eye"></i></a>
                            <form class="form-delete" action="{{ Auth::user()->roles[0]->name == 'administrator' ? route('administrator.destroy.course', $course->slug) : route('mentor.destroy.course', $course->slug)  }}" method="POST">
                              @csrf
                              @method('DELETE')
                                <a href="#"><i class="fa fa-trash mx-1 swall-delete" data-title="{{ $course->title }}"></i></a>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>NO</th>
                          <th>Title</th>
                          <th>Language</th>
                          <th>Program Language</th>
                          <th>Pricing</th>
                          <th>Dificulty</th>
                          <th>Duration</th>
                          <th>Series</th>
                          <th>Mentor</th>
                          <th>Created At</th>
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