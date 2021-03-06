<x-dashboard-layout>
      <x-slot name="content_header">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-left mb-0">Learn</h2>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ redirect()->back() }}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{ redirect()->back() }}">HTML & CSS Crash Course</a>
                  </li>
                  <li class="breadcrumb-item active">Learning
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrum-right d-flex">
              <a><i class="feather icon-help-circle text-lg mr-1"></i></a>
              <a href="#" class="btn btn-outline-primary btn-sm mr-2">Previous Eposode</a>
              <a href="#" class="btn btn-primary btn-sm">Next Episodes</a>
          </div>
        </div>
      </x-slot>
  
  <div class="row">
    <div class="col-12 main">
        <!-- note: you should not add the offsets, removed them. Also note this is inside the row, your original wasan't -->
        <iframe id="iframeid" src="https://scrimba.com/learn/htmlcss/introduction-c4GE7ns6" style="width:100%; height:100%;margin:0px;border:0px"></iframe>
    </div>
  </div>
  
  <x-slot name="page_script">
    <script type="text/javascript">
            function windowDimensions() { // prototype/jQuery compatible
            var myWidth = 0, myHeight = 0;
            if( typeof( window.innerWidth ) == 'number' ) {
                //Non-IE or IE 9+ non-quirks
                myWidth = window.innerWidth;
                myHeight = window.innerHeight;
            } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
                //IE 6+ in 'standards compliant mode'
                myWidth = document.documentElement.clientWidth;
                myHeight = document.documentElement.clientHeight;
            } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
                //IE 5- (lol) compatible
                myWidth = document.body.clientWidth;
                myHeight = document.body.clientHeight;
            }
            if (myWidth < 1) myWidth = screen.width; // emergency fallback to prevent division by zero
            if (myHeight < 1) myHeight = screen.height; 
            return [myWidth,myHeight];
        }
        var dim = windowDimensions();
        myIframe = $('#iframeid'); // changed the code to use jQuery
        myIframe.height((dim[1]) + "px");
        </script>
  </x-slot>
</x-dashboard-layout>