@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('adminAssets/assets/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">
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

        {{-- <div class="education layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Education</h3>
                <div class="timeline-alter">
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">04 Mar 2009</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            <p>Royal Collage of Art</p>
                            <p>Designer Illustrator</p>
                        </div>
                    </div>
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">25 Apr 2014</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            <p>Massachusetts Institute of Technology (MIT)</p>
                            <p>Designer Illustrator</p>
                        </div>
                    </div>
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">04 Apr 2018</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            <p>School of Art Institute of Chicago (SAIC)</p>
                            <p>Designer Illustrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="work-experience layout-spacing ">

            <div class="widget-content widget-content-area">

                <h3 class="">Work Experience</h3>

                <div class="timeline-alter">

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">04 Mar 2009</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            <p>Netfilx Inc.</p>
                            <p>Designer Illustrator</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">25 Apr 2014</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            <p>Google Inc.</p>
                            <p>Designer Illustrator</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">04 Apr 2018</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            <p>Design Reset Inc.</p>
                            <p>Designer Illustrator</p>
                        </div>
                    </div>

                </div>
            </div>

        </div> --}}

    </div>


    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

        <div class="skills layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Skills</h3>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-title"><span>PHP</span> <span>25%</span> </div>
                    </div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-title"><span>Wordpress</span> <span>50%</span> </div>
                    </div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-title"><span>Javascript</span> <span>70%</span> </div>
                    </div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-title"><span>jQuery</span> <span>60%</span> </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="bio layout-spacing ">

            @include('pages.student.partials.subject')

        </div>

    </div>


    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">


                </div>
            </div>
        </div>
    </div>
@endsection




@section('javascript')
    <script>
        let input = document.getElementsByClassName('new-control-input');

        // console.log(href);
        for (let element of input) {
            element.addEventListener('change', function(event) {
                let href = $(this).data('href');
                let groupid = $(this).data('groupid');
                let lessonid = $(this).data('lessonid');
                let studentid = $(this).data('studentid');
                console.log(href);
                if (element.checked == true) {
                    $.ajax({
                        url: href,
                        data: {

                            group_id: groupid,
                            lesson_id: lessonid,
                            student_id: studentid,

                        },
                        success: function(response) {

                        },
                        error: function() {}
                    })
                } else {
                    $.ajax({
                        url: href,
                        data: {
                            finished: false
                        },
                        success: function(response) {},

                    })
                }
            })
        }
    </script>
    {{-- <script>
        $('.new-control-input').on('change', function() {
                    console.log('mohamed ');
                }
    </script> --}}
@endsection
