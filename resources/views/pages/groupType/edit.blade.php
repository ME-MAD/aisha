@extends('master')
@section('css')
    <link href="{{ asset('adminAssets/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/plugins/select2/select2.min.css')}}">
    <link href="{{asset('adminAssets/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <link href="{{asset('adminAssets/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <style>
        #demo_vertical::-ms-clear, #demo_vertical2::-ms-clear { display: none; }
        input#demo_vertical { border-top-right-radius: 5px; border-bottom-right-radius: 5px; }
        input#demo_vertical2 { border-top-right-radius: 5px; border-bottom-right-radius: 5px; }
    </style>
@endsection
@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Edit Group Days</h3>
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
                    href="{{ route('admin.group_day.index') }}">Group Days</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.group_types.create') }}">Create Group Day</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center text-primary">Create Group Types</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.group_types.update',$group_type->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="group_type_id" value="{{ $group_type->id }}">



                            <x-text name="name" label="الاسم" :value="$group_type->name" />
                               
                          <x-text name="days_num" label="عدد الايام" :value="$group_type->days_num" id="days_num"  />    

                            <x-text name="price" label="السعر" id="currency" :value="$group_type->price" />

                            
                           

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary mt-3">Lets Go</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("javascript")

<script src="{{asset('adminAssets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('adminAssets/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('adminAssets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('adminAssets/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
<script>
    $("input[name='days_num']").TouchSpin({
        verticalbuttons: true,
        min: 1,
        max: 7,
        step: 1,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 10,
        buttondown_class: "btn btn-classic btn-primary",
        buttonup_class: "btn btn-classic btn-danger"
}   );
</script>
<script>
    $("#currency").inputmask({mask:"$999.99"});
</script>

@endsection
