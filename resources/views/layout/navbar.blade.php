<!--  BEGIN TOPBAR  -->
<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ asset('adminAssets/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> CORK </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

            <li class="menu single-menu{{
                    request()->routeIs('admin.home') ||
                    request()->routeIs('admin.user.index') ||
                    request()->routeIs('admin.role.index') ||
                    request()->routeIs('admin.role.edit') ? 'active' : ''
            }}">

                <a href="{{route('admin.home')}}" data-toggle="collapse" aria-expanded="true"
                   class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="font-weight-bold text-capitalize">
                            {{__('global.settings')}}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                    <li class="{{request()->routeIs('admin.user.index') ? 'active' : '' }}">
                        <a href="{{route('admin.user.index')}}"
                           class="text-capitalize font-weight-bold">{{__('global.users')}} </a>
                    </li>
                    <li class="{{
                                request()->routeIs('admin.role.index') ||
                                 request()->routeIs('admin.role.edit') ? 'active' : ''
                            }}">
                        <a href="{{route('admin.role.index')}}"
                           class="text-capitalize font-weight-bold">{{__('roles.roles')}} </a>
                    </li>
                </ul>
            </li>

            {{-- Teacher --}}
            {{-- @check_permission("index-teacher") --}}

            @check_permission_in_permissions(['index-teacher','index-experience'])
                <li class="menu single-menu {{
                    request()->routeIs('admin.teacher.index') ||
                    request()->routeIs('admin.teacher.show')||
                    request()->routeIs('admin.experience.index')  ? 'active' : ''
                    }}
                ">
                    <a href="{{route('admin.teacher.index')}}" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle">
                        <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>{{ __('global.Teachers') }}</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        @check_permission("index-teacher")
                        <li class="{{
                                        request()->routeIs('admin.teacher.index')  ? 'active' : ''
                                    }}">
                            <a href="{{ route('admin.teacher.index') }}"> 
                                {{ __('global.Teachers') }} 
                            </a>
                        </li>
                    @endcheck_permission
                    @check_permission("index-experience")
                        <li class="{{
                                        request()->routeIs('admin.experience.index')  ? 'active' : ''
                                    }}">
                            <a href="{{ route('admin.experience.index') }}">{{ __('global.Experiences') }}</a>
                        </li>
                        @endcheck_permission
                    </ul>
                </li>
            @endcheck_permission_in_permissions
            
            {{-- @endcheck_permission --}}

              {{-- Student --}}
            {{-- @check_permission("index-student") --}}
            <li class="menu single-menu {{
                                    request()->routeIs('admin.student.index') ||
                                    request()->routeIs('admin.student.show') ? 'active' : ''
                                }}">
                <a href="{{route('admin.student.index')}}" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">
                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                             fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>{{ __('global.Students') }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    <li class="{{
                                    request()->routeIs('admin.student.index')  ? 'active' : ''
                                }}">
                        <a href="{{ route('admin.student.index') }}"> {{ __('global.Students') }} </a>
                    </li>
                </ul>
            </li>
            {{-- @endcheck_permission --}}

            {{-- Group --}}
            {{-- @check_permission("index-group") --}}
            <li class="menu single-menu {{
                                    request()->routeIs('admin.group.index')||
                                    request()->routeIs('admin.group_day.index')||
                                    request()->routeIs('admin.group_students.index')||
                                    request()->routeIs('admin.group_types.index')  ? 'active' : ''
                                }}">
                <a href="{{route('admin.group.index')}}"
                   data-toggle="collapse"
                   aria-expanded="false"
                   class="dropdown-toggle">

                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                             stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             class="css-i6dzq1">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                            </path>
                            <line x1="12" y1="11" x2="12" y2="17"></line>
                            <line x1="9" y1="14" x2="15" y2="14"></line>
                        </svg>
                        <span>{{ __('global.groups') }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">

                    @check_permission("index-group")
                    <li class="{{ request()->routeIs('admin.group.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.group.index') }}"> {{ __('global.groups') }} </a>
                    </li>
                    @endcheck_permission

                    @check_permission("index-groupDay")
                    <li class="{{ request()->routeIs('admin.group_day.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.group_day.index') }}">{{ __('global.Group Days') }}</a>
                    </li>
                    @endcheck_permission

                    @check_permission("index-groupStudent")
                    <li class="{{ request()->routeIs('admin.group_students.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.group_students.index') }}">{{ __('global.Group Students') }}</a>
                    </li>
                    @endcheck_permission

                    @check_permission("index-groupType")
                    <li class="{{ request()->routeIs('admin.group_types.index') ? 'active' : ''}}">
                        <a href="{{ route('admin.group_types.index') }}">{{ __('global.Group Types') }}</a>
                    </li>
                    @endcheck_permission

                </ul>
            </li>
            {{-- @endcheck_permission --}}

            {{-- subject --}}
            {{-- @check_permission("index-subject") --}}
            <li class="menu single-menu
                                {{
                                    request()->routeIs('admin.subject.index')||
                                     request()->routeIs('admin.lesson.index')  ? 'active' : ''
                                }}">
                <a href="{{ route('admin.subject.index') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                             stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             class="css-i6dzq1">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <span>{{ __('global.Subjects') }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    @check_permission("index-subject")
                    <li class="{{request()->routeIs('admin.subject.index')? 'active' : ''}}">
                        <a href="{{ route('admin.subject.index') }}"> {{ __('global.Subjects') }} </a>
                    </li>
                    @endcheck_permission

                    @check_permission("index-lesson")
                    <li class="{{request()->routeIs('admin.lesson.index')? 'active' : ''}}">
                        <a href="{{ route('admin.lesson.index') }}"> {{ __('global.Lessons') }} </a>
                    </li>
                    @endcheck_permission
                </ul>
            </li>
            {{-- @endcheck_permission --}}

            {{-- payment --}}
            {{-- @check_permission("index-payment") --}}
            <li class="menu single-menu
                              {{     request()->routeIs('admin.payment.index')||
                                     request()->routeIs('admin.payment.create')  ? 'active' : ''
                                }}">
                <a href="{{ route('admin.payment.index') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                             stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             class="css-i6dzq1">
                            <rect x="1" y="4" width="22" height="16" rx="2"
                                  ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <span>{{ __('global.Payment') }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">

                    @check_permission("index-payment")
                    <li class="{{request()->routeIs('admin.payment.index')? 'active' : ''}}">
                        <a href="{{ route('admin.payment.index') }}">{{ __('global.Payment') }}</a>
                    </li>
                    @endcheck_permission

                    @check_permission("create-payment")
                    <li class="{{request()->routeIs('admin.payment.create')? 'active' : ''}}">
                        <a href="{{ route('admin.payment.create') }}">{{ __('global.Create payments') }}</a>
                    </li>
                    @endcheck_permission
                </ul>
            </li>
            {{-- @endcheck_permission --}}

            {{-- Exam --}}
            {{-- @check_permission("create-payment") --}}
            <li class="menu single-menu {{
                                        request()->routeIs('admin.exam.index')||
                                     request()->routeIs('admin.exam.create')  ? 'active' : ''
                                }}">
                <a href="{{ route('admin.exam.index') }}"
                   data-toggle="collapse"
                   aria-expanded="false"
                   class="dropdown-toggle">

                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                             stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             class="css-i6dzq1">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="12" y1="18" x2="12" y2="12"></line>
                            <line x1="9" y1="15" x2="15" y2="15"></line>
                        </svg>
                        <span>{{ __('global.Exams') }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                    
                    @check_permission("create-payment")
                    <li class="{{request()->routeIs('admin.exam.index')? 'active' : ''}}">
                        <a href="{{ route('admin.exam.index') }}">{{ __('global.Exams') }}</a>
                    </li>
                    @endcheck_permission

                    @check_permission("create-payment")
                    <li class="{{request()->routeIs('admin.exam.create')? 'active' : ''}}">
                        <a href="{{ route('admin.exam.create') }}">{{ __('global.Create Exam') }}</a>
                    </li>
                    @endcheck_permission
                </ul>
            </li>
            {{-- @endcheck_permission --}}


        </ul>
    </nav>
</div>
<!--  END TOPBAR  -->
