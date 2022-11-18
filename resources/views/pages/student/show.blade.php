@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('adminAssets/assets/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">

    <link href="{{asset('adminAssets/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/student.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>{{ $student->name }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Student</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.student.index') }}">Student</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.student.show', $student->id) }}">{{ $student->name }}</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">

            @include('pages.student.partials.profileStudent')

        </div>


    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">


        <div class="bio layout-spacing ">



        </div>

    </div>

    <div class="col-xl-12 col-lg-12 col-md-12">

        @include('pages.student.partials.subjects')
        
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 mt-4 showLessonContainer">

        @include('pages.student.partials.showLesson')

    </div>
@endsection




@section('javascript')

    <script src="{{asset('adminAssets/plugins/turn/turn.min.js')}}"></script>
    <script src="{{asset('js/subject.js')}}"></script>

    <script>
        let input = document.getElementsByClassName('lesson_finished_checkbox');


        for (let element of input) {
            element.addEventListener('change', function(event) {
                let href = $(this).data('href');

                let groupid = $(this).data('groupid');
                let lessonid = $(this).data('lessonid');
                let studentid = $(this).data('studentid');
                let chaptercount = $(this).data('chaptercount');

                if (element.checked == true) {
                    $.ajax({
                        url: href,
                        data: {
                            group_id: groupid,
                            lesson_id: lessonid,
                            student_id: studentid,
                            finished: true,
                            chapters_count: chaptercount
                        },
                        success: function(response) {
                            $(element).parent().parent().parent().find(
                                '.progressOfSubjectLink .progress-bar').css({
                                'width': '100%',
                                'transision': '1.5s'
                            }).find(".progress-bar-percentage").html("100%")
                            // swal("Success", "Success", "success");
                        },
                        error: function() {}
                    })
                } else {
                    $.ajax({
                        url: href,
                        data: {
                            group_id: groupid,
                            lesson_id: lessonid,
                            student_id: studentid,
                            finished: false,
                        },
                        success: function(response) {
                            swal("Success", "Success", "success");
                        },
                        error: function() {}

                    })
                }
            })
        }
    </script>
@endsection
