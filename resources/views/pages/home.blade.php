@extends('master')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>{{ __('home.Analytics Dashboard') }}</h3>
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
    <div class="text-center w-100" id="getfromdata" data-href="{{ route('admin.getDataAjax') }}">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing" id="statustucsContanerOne">

                {{-- on file ajax js/home.js --}}

            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing" id="statustucsContanerTwo">

                {{-- on file ajax js/home.js --}}

            </div>
        </div>
    </div>
@endsection



@section('javascript')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
