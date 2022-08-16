@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>{{ $teacher->name }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Teacher</span>
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
    <div class="layout-px-spacing">

        <div class="row layout-spacing">

            <!-- Content -->
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Info</h3>
                        <a href="{{route('admin.teacher.edit',$teacher->id)}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>
                    <div class="text-center user-info">
                        @include('pages.teacher.icons.imgTeacher')
                        <p class="">{{$teacher->name}}</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> {{$teacher->qualification}}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{$teacher->birthday}}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{$teacher->phone}}
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{$teacher->note}}</a>
                                </li>
                            </ul>
                        </div>                                    
                    </div>
                </div>
            </div>

                <div class="education layout-spacing ">
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
                </div>

                


                @include('pages.teacher.partials.experience')






            </div>

            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                <div class="skills layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Skills</h3>
                        <div class="progress br-30">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-title"><span>PHP</span> <span>25%</span> </div>
                            </div>
                        </div>
                        <div class="progress br-30">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-title"><span>Wordpress</span> <span>50%</span> </div>
                            </div>
                        </div>
                        <div class="progress br-30">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-title"><span>Javascript</span> <span>70%</span> </div>
                            </div>
                        </div>
                        <div class="progress br-30">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-title"><span>jQuery</span> <span>60%</span> </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Bio</h3>
                        <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus
                            vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non
                            pharetra lacus erat ac nulla.</p>

                        <p>Sed vulputate, ligula eget mollis auctor, lectus elit feugiat urna, eget euismod turpis lectus
                            sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Nunc ut velit finibus, scelerisque sapien vitae, pharetra est. Nunc accumsan ligula vehicula
                            scelerisque vulputate.</p>

                        <div class="bio-skill-box">

                            <div class="row">

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Sass Applications</h5>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat
                                                nulla pariatur.</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Github Countributer</h5>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo
                                                consequat.</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Photograhpy</h5>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                                anim id est laborum.</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                    <div class="d-flex b-skills">
                                        <div>
                                        </div>
                                        <div class="">
                                            <h5>Mobile Apps</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore
                                                magna aliqua.</p>
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


