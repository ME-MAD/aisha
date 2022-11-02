@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('breadcrumb')
    <div class="page-header">

        <div class="page-title">
            <h3>Teacher Page</h3>
        </div>
        <div class="page-title">
            <h3 class="alert alert-primary">{{ $teacher->name }}</h3>
        </div>

        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Teacher</span> : Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.teacher.index') }}">teacher</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.teacher.show', $teacher->id) }}">{{ $teacher->name }}</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Start Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing"
        data-href="{{ route('admin.teacher.getTeacherShowDataAjax', $teacher->id) }}" id="profileAneExperience">
        @include('pages.teacher.partials.profile')

    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
        @include('pages.teacher.partials.statistics')
        @include('pages.teacher.partials.groups')
    </div>
    @include('pages.teacher.partials.experience')
    @include('pages.teacher.partials.students')


    @include('pages.teacher.editModal')
@endsection




@section('javascript')
    <script src="{{ asset('js/invoice-list.js') }}"></script>
    <script src="{{ asset('js/teacher.js') }}"></script>
    <script src="{{ asset('js/experience.js') }}"></script>
    <script>
        // let createDate = document.getElementById('createDateExperience')
        // createDate.max = new Date().toISOString().split("T")[0]
        // let editDate = document.getElementById('editDateExperience')
        // editDate.max = new Date().toISOString().split("T")[0]
    </script>

    <script>
        initEditeTeacherModal()
        initEditeExperienceModal()
    </script>

    {{-- <script src="{{ asset('adminAssets/assets/js/apps/invoice.js') }}"></script> --}}
@endsection
