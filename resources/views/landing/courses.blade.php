<x-landinglayout>
  <!--hero section start-->

<section class="position-relative">
  <div id="particles-js"></div>
  <div class="container">
    <div class="row  text-center">
      <div class="col">
        <h1>Courses</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a>
            </li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Courses</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<!--hero section end--> 


<!--body content start-->

<div class="page-content">

<!--blog start-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4 mb-6 mb-lg-0">
        @foreach($courses as $course)
        <!-- Blog Card -->
        <div class="card border-0 bg-transparent mt-2">
          <div class="position-absolute bg-white shadow-primary text-center p-2 rounded ml-3 mt-3">{{ $course->mentor->name }}</div>
          <a href="{{ route('course.detail', $course->slug) }}"><img class="card-img-top shadow rounded" src="{{ $course->thumbnail }}" alt="Image">
          <div class="card-body pt-5"> <a class="d-inline-block text-muted mb-2" href="#">{{ $course->programming_language }}</a>
            <h2 class="h5 font-weight-medium">
                <a class="link-title" href="{{ route('course.detail', $course->slug) }}">{{ $course->title }}</a>
              </h2>
            <p>{{ Str::limit($course->description, 150) }}</p>
          </div>
          <div class="card-footer bg-transparent border-0 pt-0">
            <ul class="list-inline mb-0">
              <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-primary"></i> 131</a>
              </li>
              <li class="list-inline-item pr-4"> <a href="#" class="text-muted"><i class="ti-eye mr-1 text-primary"></i> 255</a>
              </li>
              <li class="list-inline-item"> <a href="#" class="text-muted"><i class="ti-comments mr-1 text-primary"></i> 14</a>
              </li>
            </ul>
          </div>
          <div></div>
        </div>
        <!-- End Blog Card -->
        @endforeach
      </div>
    </div>


    <div class="row mt-5">
  <div class="col-12 center d-flex justify-content-center">
   {!! $courses->links() !!}
  </div>
</div>
  </div>
</section>

<!--blog end-->

</div>

<!--body content end--> 
</x-landinglayout>
