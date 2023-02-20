@extends('master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('adminAssets/assets/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('adminAssets/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/assets/css/forms/switches.css')}}">

    <link rel="stylesheet" href="{{ asset('css/student.css') }}">

    <link href="{{asset('adminAssets/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
    <!--  END CUSTOM STYLE FILE  -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.3.122/web/pdf_viewer.min.css">


@endpush

@section('breadcrumb')
<div class="row my-3 ">
    <div class="col-md-12">
        <div class="breadcrumb bg-transparent">
            <div class="breadcrumb-four">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('admin.home')}}"
                           class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-house mx-2 fa-2x"></i>
                            <span class="font-weight-bold mt-1">{{__('global.home')}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('admin.student.index')}}"
                           class="d-flex justify-content-center align-items-center">

                            <i class="fa-solid fa-users-gear fa-2x mx-2"></i>
                            <span class="font-weight-bold ">كشف الطلاب</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.teacher.index')}}"
                           class="d-flex justify-content-center align-items-center">

                             <i class="fa-solid fa-user-check fa-2x mx-2"></i>
                            <span class="font-weight-bold ">{{ $student->name }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing" id="studentProfileContainer" data-student-id="{{$student->id}}">

            @include('pages.student.partials.profileStudent')

        </div>


    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">


        <div class="bio layout-spacing ">


        </div>

    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 mt-4 showLessonContainer">

        @include('pages.student.partials.showLesson')

    </div>

    <div class="col-xl-12 col-lg-12 col-md-12">

        @include('pages.student.partials.subjects')

    </div>



    @include('pages.student.partials.newLessonModal')
    @include('pages.student.partials.newLessonModalReview')
    @include('pages.student.editModal')
@endsection



@push('js')

<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.3.122/build/pdf.min.js"></script>


    <script src="{{ asset('adminAssets/plugins/turn/turn.min.js') }}"></script>
    {{-- <script src="{{ asset('js/subject.js') }}"></script> --}}
    <script type="module" src="{{ asset('js/student/show.js') }}"></script>
    <script>

        // renderSubjectsInStudentsShow()
        initEditeStudentModal()

</script>

@endpush

