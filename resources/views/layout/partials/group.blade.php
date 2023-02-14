@check_permission_in_permissions(['index-group','index-groupDay','index-groupStudent','index-groupType','show-group'])
    <li class="menu single-menu {{
            request()->routeIs('admin.group.index')||
            request()->routeIs('admin.group.show')||
            request()->routeIs('admin.group_day.index')||
            request()->routeIs('admin.group_students.index')||
            request()->routeIs('admin.group_types.index')  ? 'active' : ''
        }}">
        <a href="#group"
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
        <ul class="collapse submenu list-unstyled {{
                request()->routeIs('admin.group.index')||
                request()->routeIs('admin.group.show')||
                request()->routeIs('admin.group_day.index')||
                request()->routeIs('admin.group_students.index')||
                request()->routeIs('admin.group_types.index')  ? 'show' : ''
            }}" id="group" data-parent="#topAccordion">

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
@endcheck_permission_in_permissions