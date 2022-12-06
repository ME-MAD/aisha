@extends('master')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Analytics Dashboard</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily
                    Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly
                    Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics"
                    href="javascript:void(0);">Monthly Analytics</a>
                <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
                <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="text-center w-100">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="text-secondary">Groups <span
                                class="badge badge-secondary ml-2">{{ $allGroupsCount }}</span>
                        </h5>
                    </div>
                    <div class="widget-content">
                        <div class="vistorsBrowser">
                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <line x1="21.17" y1="8" x2="12" y2="8"></line>
                                        <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
                                        <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
                                    </svg>
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>kid<span class="badge badge-primary ml-2">{{ $groupKidsCount }}</span></h6>
                                        <p class="browser-count">{{ $groupKidsPercentage }}%</p>
                                    </div>
                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                style="width: {{ $groupKidsPercentage }}%" aria-valuenow="90"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-browser-details">

                                    <div class="w-browser-info">
                                        <h6>Adult<span class="badge badge-danger ml-2">{{ $groupAdultCount }}</span></h6>
                                        <p class="browser-count">{{ $groupAdultPercentage }}%</p>
                                    </div>

                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                style="width: {{ $groupAdultPercentage }}%" aria-valuenow=""
                                                aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="text-secondary">Groups <span
                                class="badge badge-secondary ml-2">{{ $allGroupsCount }}</span>
                        </h5>
                    </div>
                    <div class="widget-content">
                        <div class="vistorsBrowser">
                            @foreach ($groupTypes as $groupType)
                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <circle cx="12" cy="12" r="4"></circle>
                                            <line x1="21.17" y1="8" x2="12" y2="8"></line>
                                            <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
                                            <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
                                        </svg>
                                    </div>
                                    <div class="w-browser-details">
                                        <div class="w-browser-info">
                                            <h6>{{$groupType->name}} <span class="badge badge-primary ml-2">{{ $groupType->groups_count }}</span>
                                            </h6>
                                            <p class="browser-count">{{ $groupType->percentage }}%</p>
                                        </div>
                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                    style="width: {{ $groupType->percentage }}%" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
