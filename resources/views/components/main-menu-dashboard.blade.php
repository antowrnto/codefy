  @role('administrator')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-dark/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Codefy</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="{{ route('dashboard.administrator') }}"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">*</span></a>
                
                <li class=" navigation-header"><span>Aplications</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title">Email</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-message-square"></i><span class="menu-title">Chat</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-check-square"></i><span class="menu-title">Todo</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title">Calender</span></a>
                </li>
                
                <li class=" navigation-header"><span>Management Data</span>
                </li>
                <li class="nav-item {{ Request::segment(3) == 'role' ? 'active' : ' ' }}"><a href="{{ route('administrator.management.role') }}"><i class="feather icon-box"></i><span class="menu-title">Data Role</span></a>
                </li>
                <li class="nav-item {{ Request::segment(3) == 'mentor' ? 'active' : ' ' }}"><a href="{{ route('administrator.management.mentor') }}"><i class="feather icon-package"></i><span class="menu-title">Data Mentor</span></a>
                </li>
                <li class="nav-item {{ Request::segment(3) == 'student' ? 'active' : ' ' }}"><a href="{{ route('administrator.management.student') }}"><i class="feather icon-check-circle"></i><span class="menu-title">Data Student</span></a>
                </li>
                <li class="nav-item {{ Request::segment(3) == 'series' ? 'active' : ' ' }}"><a href="{{ route('administrator.management.series') }}"><i class="feather icon-server"></i><span class="menu-title">Data Series</span></a>
                </li>
                <li class="nav-item {{ Request::segment(3) == 'course' ? 'active' : ' ' }}"><a href="{{ route('administrator.management.course') }}"><i class="feather icon-grid"></i><span class="menu-title">Data Courses</span></a>
                </li>
                <li class="nav-item {{ Request::segment(3) == 'episode' ? 'active' : ' ' }}"><a href="{{ route('administrator.management.episode') }}"><i class="feather icon-grid"></i><span class="menu-title">Data Episodes</span></a>
                </li>
                
                {{--<li class=" navigation-header"><span>Extensions</span>
                </li>
                <li class=" nav-item"><a href="ext-component-sweet-alerts.html"><i class="feather icon-alert-circle"></i><span class="menu-title" data-i18n="Sweet Alert">Sweet Alert</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-toastr.html"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Toastr">Toastr</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-noui-slider.html"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="NoUi Slider">NoUi Slider</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-file-uploader.html"><i class="feather icon-upload-cloud"></i><span class="menu-title" data-i18n="File Uploader">File Uploader</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-quill-editor.html"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Quill Editor">Quill Editor</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-drag-drop.html"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Drag &amp; Drop">Drag &amp; Drop</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-tour.html"><i class="feather icon-info"></i><span class="menu-title" data-i18n="Tour">Tour</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-clipboard.html"><i class="feather icon-copy"></i><span class="menu-title" data-i18n="Clipboard">Clipboard</span></a>
                </li>
                <li class=" nav-item"><a href=" ext-component-plyr.html"><i class="feather icon-film"></i><span class="menu-title" data-i18n="Media player">Media player</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-context-menu.html"><i class="feather icon-more-horizontal"></i><span class="menu-title" data-i18n="Context Menu">Context Menu</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-swiper.html"><i class="feather icon-smartphone"></i><span class="menu-title" data-i18n="swiper">swiper</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-i18n.html"><i class="feather icon-globe"></i><span class="menu-title" data-i18n="l18n">l18n</span></a>
                </li>--}}

                <li class=" navigation-header"><span>Support</span>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="Raise Support">Raise Support</span></a>
                </li>
            </ul>
        </div>
    </div>
  @endrole
  
  @role('mentor')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-dark/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Codefy</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="{{ route('dashboard.mentor') }}"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">*</span></a>
                
                <li class=" navigation-header"><span>Aplications</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title">Email</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-message-square"></i><span class="menu-title">Chat</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-check-square"></i><span class="menu-title">Todo</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title">Calender</span></a>
                </li>
                
                <li class=" navigation-header"><span>Management Data</span>
                </li>
                <li class=" nav-item"><a href=""><i class="feather icon-check-circle"></i><span class="menu-title">Data Student</span></a>
                </li>
                <li class=" nav-item"><a href=""><i class="feather icon-grid"></i><span class="menu-title">Data Courses</span></a>
                </li>
                <li class=" nav-item"><a href=""><i class="feather icon-grid"></i><span class="menu-title">Data Episodes</span></a>
                </li>
                
                {{--<li class=" navigation-header"><span>Extensions</span>
                </li>
                <li class=" nav-item"><a href="ext-component-sweet-alerts.html"><i class="feather icon-alert-circle"></i><span class="menu-title" data-i18n="Sweet Alert">Sweet Alert</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-toastr.html"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Toastr">Toastr</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-noui-slider.html"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="NoUi Slider">NoUi Slider</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-file-uploader.html"><i class="feather icon-upload-cloud"></i><span class="menu-title" data-i18n="File Uploader">File Uploader</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-quill-editor.html"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Quill Editor">Quill Editor</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-drag-drop.html"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Drag &amp; Drop">Drag &amp; Drop</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-tour.html"><i class="feather icon-info"></i><span class="menu-title" data-i18n="Tour">Tour</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-clipboard.html"><i class="feather icon-copy"></i><span class="menu-title" data-i18n="Clipboard">Clipboard</span></a>
                </li>
                <li class=" nav-item"><a href=" ext-component-plyr.html"><i class="feather icon-film"></i><span class="menu-title" data-i18n="Media player">Media player</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-context-menu.html"><i class="feather icon-more-horizontal"></i><span class="menu-title" data-i18n="Context Menu">Context Menu</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-swiper.html"><i class="feather icon-smartphone"></i><span class="menu-title" data-i18n="swiper">swiper</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-i18n.html"><i class="feather icon-globe"></i><span class="menu-title" data-i18n="l18n">l18n</span></a>
                </li>--}}

                <li class=" navigation-header"><span>Support</span>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="Raise Support">Raise Support</span></a>
                </li>
            </ul>
        </div>
    </div>
  @endrole
  
  @role('student')
  
  @endrole