@extends('master')

@section('css')
    <link href="{{asset('adminAssets/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Lesson {{$studentLesson->lesson->title ?? ''}}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily
                    Analytics</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.student.show',$studentLesson->student_id) }}">
                    Student {{$studentLesson->student->name ?? ''}}
                </a>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <div class="bio-skill-box">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Subject</h5>
                                                <p>{{$studentLesson->lesson->subject->name ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Lesson</h5>
                                                <p>{{$studentLesson->lesson->title ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Student</h5>
                                                <p>{{$studentLesson->student->name ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Group</h5>
                                                <p>{{$studentLesson->group->name ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                
                    </div>
                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">Lesson : {{$studentLesson->lesson->title ?? ''}}</h3>

                            <div class="bio-skill-box">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Chapters Count</h5>
                                                <p>{{$studentLesson->lesson->chapters_count ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Lesson Starts From</h5>
                                                <p>{{$studentLesson->lesson->from_page ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Lesson Ends At</h5>
                                                <p>{{$studentLesson->lesson->to_page ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                
                    </div>
                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <div class="bio-skill-box">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex b-skills {{$studentLesson->finished ? 'bg-success' : 'bg-danger'}}">
                                            <div class="">
                                                <h5 style="color:white">Finished That Lesson</h5>
                                                <p style="color:white">{{$studentLesson->finished ? 'Finished' : 'Not Finished'}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Percentage</h5>
                                                <p>{{$studentLesson->percentage}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Last Chapter Finished</h5>
                                                <p>{{$studentLesson->last_chapter_finished}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Last Page Finished</h5>
                                                <p>{{$studentLesson->last_page_finished}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
