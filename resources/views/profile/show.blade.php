<x-dashboard-layout>
    <x-slot name="vendor_style">
      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
    </x-slot>

    <x-slot name="page_css">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/validation/form-validation.css') }}">
    </x-slot>

    <x-slot name="content_header">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Pages</a>
                            </li>
                            <li class="breadcrumb-item active"> Account Settings
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                </div>
            </div>
        </div>
    </x-slot>
    
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                  @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            General
                        </a>
                    </li>
                  @endif
                  
                  @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Change Password
                        </a>
                    </li>
                  @endif
                  
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                            <i class="feather icon-info mr-50 font-medium-3"></i>
                            Info
                        </a>
                    </li>
                    
                    
                    <!-- <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                            <i class="feather icon-camera mr-50 font-medium-3"></i>
                            Social links
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                            <i class="feather icon-feather mr-50 font-medium-3"></i>
                            Connections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                            <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                            Two factor authentication
                        </a>
                    </li> -->
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <!--@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                                @endif-->
                                
                                    @livewire('profile.update-profile-information-form')
                                    @livewire('profile.update-password-form')
                                    @livewire('profile.update-profile-information-account')

                                <!--@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                @endif-->
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="vendor_script">
      <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
      <script src="{{ asset('vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
      <script src="{{ asset('vendors/js/pickers/pickadate/picker.js') }}"></script>
      <script src="{{ asset('vendors/js/pickers/pickadate/picker.date.js') }}"></script>
      <script src="{{ asset('vendors/js/extensions/dropzone.min.js') }}"></script>
    </x-slot>

    <x-slot name="page_script">
      <script src="{{ asset('js/scripts/pages/account-setting.js') }}"></script>
    </x-slot>
</x-dashboard-layout>