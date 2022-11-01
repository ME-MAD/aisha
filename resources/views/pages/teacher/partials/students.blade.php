<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-menu chat-menu d-xl-none">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></div>
                    </div>
                <div class="doc-container">
                    <div class="tab-title open-inv-sidebar">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block ps ps--active-y" id="pills-tab"
                                    role="tablist">
                                    {{-- @foreach ($groups as $group)
                                        <li class="nav-item">
                                            <div class="nav-link list-actions" id="group-{{ $group->id }}"
                                                data-invoice-id="group : {{ $group->id }}">
                                                <div class="f-m-body">
                                                    <div class="f-head">
                                                        <svg viewBox="0 0 24 24" width="36" height="36"
                                                            stroke="currentColor" stroke-width="3" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="css-i6dzq1">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="f-body">
                                                        <p class="invoice-customer-name"><span>Age
                                                                Type:</span><span
                                                                class="badge bg-info mb-2">{{ $group->age_type }}</span>
                                                        </p>
                                                        <p class="invoice-generated-date">Time: <span
                                                                class="badge bg-success mb-2">{{ $group->ffrom }}</span>
                                                        </p>
                                                        <p class="invoice-generated-date">Time: <span
                                                                class="badge bg-danger mb-2">{{ $group->fto }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach --}}




                                    <div class="ps__rail-x" style="left: 0px; bottom: -1083px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 1083px; height: 409px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 296px; height: 112px;">
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-container">
                        <div class="invoice-inbox ps ps--active-y" style="height: calc(100vh - 215px);">


                            <div class="invoice-header-section" style="display: flex;">
                                <h4 class="inv-number">Students Of Teachers.....</h4>
                                <div class="invoice-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-printer action-print" data-toggle="tooltip"
                                        data-placement="top" data-original-title="Reply">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path
                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                        </path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                </div>
                            </div>


                            <div id="ct" class="">
                                {{-- @foreach ($groups as $group)
                                    <div class="group-{{ $group->id }}">
                                        <div class="content-section  animated animatedFadeInUp fadeInUp">

                                            <div class="row inv--head-section">

                                                <div class="col-sm-6 col-12">
                                                    <h3 class="in-heading">{{ $group->ffrom }}</h3>
                                                </div>
                                                <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                    <div class="company-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-hexagon">
                                                            <path
                                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                            </path>
                                                        </svg>
                                                        <h5 class="inv-brand-name">
                                                            COUNT Student : {{ $group->groupStudents->count() }}</h5>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row inv--detail-section">

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-to">Days Num :
                                                        <span class="badge bg-danger mb-2">
                                                            {{ $group->groupType->days_num ?? '' }}
                                                        </span>
                                                    </p>
                                                </div>
                                                <div
                                                    class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                    <p class="inv-detail-title">Group Type :
                                                        <span class="badge bg-danger mb-2">
                                                            {{ $group->groupType->name ?? '' }}
                                                        </span>
                                                    </p>
                                                </div>

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-customer-name">Days Group :</p>
                                                    @foreach ($group->groupDays as $groupDay)
                                                        <span class="badge bg-success mb-2">{{ $groupDay->day }}
                                                        </span>
                                                    @endforeach

                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                    <p class="inv-customer-name">
                                                        <span class="text-primary">
                                                            Time Group
                                                        </span>
                                                    </p>
                                                    <p class="inv-created-date">
                                                        <span class="inv-title">From :
                                                        </span>
                                                        <span class="inv-date badge bg-info mb-2">
                                                            {{ $group->ffrom }}
                                                        </span>
                                                    </p>
                                                    <p class="inv-due-date">
                                                        <span class="inv-title">
                                                            To :
                                                        </span>
                                                        <span class="inv-date badge bg-info mb-2">
                                                            {{ $group->fto }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="row inv--product-table-section">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">Id</th>
                                                                    <th scope="col">Name</th>
                                                                    <th class="text-right" scope="col">Birthday
                                                                    </th>
                                                                    <th class="text-right" scope="col">Phone</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="student">
                                                                @foreach ($group->students as $student)
                                                                    <tr>
                                                                        <td>{{ $student->id }}</td>
                                                                        <td>
                                                                            <a class='text-primary'
                                                                                href="{{ route('admin.student.show', $student->id) }}"
                                                                                title='Enter Page show Student'>{{ $student->name }}
                                                                            </a>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            {{ $student->birthday }}</td>
                                                                        <td class="text-right">
                                                                            {{ $student->phone }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </div>

                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: -606px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 606px; right: 0px; height: 152px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 122px; height: 30px;"></div>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: -606px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 606px; right: 0px; height: 152px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 122px; height: 30px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
