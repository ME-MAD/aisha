@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('adminAssets/assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css" />
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

            @include('pages.student.partials.syllabusTable')

        </div>

    </div>


    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="mail-box-container">
                        <div class="mail-overlay"></div>

                        <div class="tab-title">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                        </path>
                                        <rect x="8" y="2" width="8" height="4"
                                            rx="1" ry="1"></rect>
                                    </svg>
                                    <h5 class="app-title">All Subjects</h5>
                                </div>

                                <div class="todoList-sidebar-scroll ps">
                                    <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                                        <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                            @foreach ($subjects as $subject)
                                                <li class="nav-item">
                                                    <a class="nav-link list-actions active" id="all-list"
                                                        data-toggle="pill" href="#pills-inbox" role="tab"
                                                        aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-list">
                                                            <line x1="8" y1="6" x2="21"
                                                                y2="6"></line>
                                                            <line x1="8" y1="12" x2="21"
                                                                y2="12"></line>
                                                            <line x1="8" y1="18" x2="21"
                                                                y2="18"></line>
                                                            <line x1="3" y1="6" x2="3"
                                                                y2="6"></line>
                                                            <line x1="3" y1="12" x2="3"
                                                                y2="12"></line>
                                                            <line x1="3" y1="18" x2="3"
                                                                y2="18"></line>
                                                        </svg>{{ $subject->name }}<span
                                                            class="todo-badge badge">9</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div id="todo-inbox" class="accordion todo-inbox">
                            <div class="search">
                                <input type="text" class="form-control input-search" placeholder="Search Here...">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-menu mail-menu d-lg-none">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </div>

                            <div class="todo-box">

                                <div id="ct" class="todo-box-scroll ps ps--active-y">
                                    @foreach ($lessons as $lesson)
                                        <div class="todo-item all-list">
                                            <div class="todo-item-inner">
                                                <div class="n-chk text-center">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox" class="new-control-input inbox-chkbox">
                                                        <span class="new-control-indicator"></span>
                                                    </label>
                                                </div>

                                                <div class="todo-content">
                                                    <h5 class="todo-heading"
                                                        data-todoheading="Meeting with Shaun Park at 4:50pm">
                                                        {{ $lesson->title }}</h5>
                                                    <p class="meta-date">Aug, 07 2020</p>
                                                    <p class="todo-text"
                                                        data-todohtml="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>"
                                                        data-todotext="{&quot;ops&quot;:[{&quot;insert&quot;:&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n&quot;}]}">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                                        pulvinar
                                                        feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet
                                                        non
                                                        augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper
                                                        tellus.
                                                        Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus
                                                        et
                                                        magnis dis parturient montes, nascetur ridiculus mus. Vestibulum
                                                        mattis
                                                        urna neque, eget posuere lorem tempus non. Suspendisse ac turpis
                                                        dictum,
                                                        convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu
                                                        commodo
                                                        urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.
                                                    </p>
                                                </div>

                                                <div class="priority-dropdown custom-dropdown-icon">
                                                    <div class="dropdown p-dropdown">
                                                        <a class="dropdown-toggle warning" href="#" role="button"
                                                            id="dropdownMenuLink-1" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12"
                                                                    y2="12"></line>
                                                                <line x1="12" y1="16" x2="12"
                                                                    y2="16"></line>
                                                            </svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                            <a class="dropdown-item danger"
                                                                href="javascript:void(0);"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-alert-octagon">
                                                                    <polygon
                                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                    </polygon>
                                                                    <line x1="12" y1="8" x2="12"
                                                                        y2="12"></line>
                                                                    <line x1="12" y1="16" x2="12"
                                                                        y2="16"></line>
                                                                </svg> مراجعه</a>
                                                            <a class="dropdown-item warning"
                                                                href="javascript:void(0);"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-alert-octagon">
                                                                    <polygon
                                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                    </polygon>
                                                                    <line x1="12" y1="8" x2="12"
                                                                        y2="12"></line>
                                                                    <line x1="12" y1="16" x2="12"
                                                                        y2="16"></line>
                                                                </svg> جمب الدرس</a>
                                                            <a class="dropdown-item primary"
                                                                href="javascript:void(0);"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-alert-octagon">
                                                                    <polygon
                                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                    </polygon>
                                                                    <line x1="12" y1="8" x2="12"
                                                                        y2="12"></line>
                                                                    <line x1="12" y1="16" x2="12"
                                                                        y2="16"></line>
                                                                </svg> درس جديد</a>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    @endforeach


                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 423px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 191px;">
                                        </div>
                                    </div>
                                </div>
                                <!-- عند حذفها يقف sleder الخاص بسور القران-->
                                <div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x close" data-dismiss="modal">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                                <div class="compose-box">
                                                    <div class="compose-content">
                                                        <h5 class="task-heading">Conference call with Marketing Manager
                                                        </h5>
                                                        <p class="task-text ps">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                                            pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius
                                                            vel, aliquet non augue. Vivamus sem ante, ultrices at ex a,
                                                            rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat.
                                                            Orci varius natoque penatibus et magnis dis parturient montes,
                                                            nascetur ridiculus mus. Vestibulum mattis urna neque, eget
                                                            posuere lorem tempus non. Suspendisse ac turpis dictum,
                                                            convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu
                                                            commodo urna vestibulum at. Suspendisse malesuada lorem eu
                                                            sodales aliquam.</p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg> Close</button>
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
    <script src="{{ asset('adminassets/assets/js/ie11fix/fn.fix-padStart.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/apps/todoList.js') }}"></script>
@endsection
