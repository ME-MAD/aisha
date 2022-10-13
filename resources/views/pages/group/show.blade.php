@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/components/cards/card.css') }}
    " rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE Data Table  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">
    <!--  END CUSTOM  Data Table  -->
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h5 class="text-dark">This is Group :</h5>
            <h3 class="text-primary"> {{ $group->from }} : {{ $group->to }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Group</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.group.index') }}">Groups</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.group.create') }}">Create Group</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <ul class="nav nav-pills mb-3 mt-3 nav-fill" id="justify-pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="justify-pills-home-tab" data-toggle="pill"
                                href="#justify-pills-home" role="tab" aria-controls="justify-pills-home"
                                aria-selected="true">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="justify-pills-profile-tab" data-toggle="pill"
                                href="#justify-pills-profile" role="tab" aria-controls="justify-pills-profile"
                                aria-selected="false">Group Days</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="justify-pills-contact-tab" data-toggle="pill"
                                href="#justify-pills-contact" role="tab" aria-controls="justify-pills-contact"
                                aria-selected="false">Group Students</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="justify-pills-tabContent">
                        <div class="tab-pane fade show active" id="justify-pills-home" role="tabpanel"
                            aria-labelledby="justify-pills-home-tab">
                            @include('pages.group.partials.teacher')
                        </div>

                        <div class="tab-pane fade" id="justify-pills-profile" role="tabpanel"
                            aria-labelledby="justify-pills-profile-tab">
                            @include('pages.group.partials.groupDays')
                        </div>

                        <div class="tab-pane fade" id="justify-pills-contact" role="tabpanel"
                            aria-labelledby="justify-pills-contact-tab">
                            @include('pages.group.partials.students')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection




@section('javascript')
    <script>
        let createDate = document.getElementById('createDateExperience')
        createDate.max = new Date().toISOString().split("T")[0]
        let editDate = document.getElementById('editDateExperience')
        editDate.max = new Date().toISOString().split("T")[0]
    </script>
@endsection
