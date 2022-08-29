@extends('master')
@section('css')
<link href="{{asset('adminAssets/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('adminAssets/plugins/select2/select2.min.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Create Table</h3>
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
                    href="{{ route('admin.group_day.create') }}">Create Group Days</a>
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
                                <h4 class="text-center text-primary">Create Group Days</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.group_day.store') }}" method="post">
                            @csrf
                        
                         
                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> اختر
                                    المجموعه</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control basic"
                                        style="width: 100%;" 
                                        name="group_id" id="group_id">
                                        <option value="">اختر اسم المجموعه</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}"
                                                {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                                {{ $group->from }} -
                                                {{ $group->to }}
                                            
                                            </option>
                                        @endforeach
                                    </select>
                                    @error("group_id")
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="day" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                                    اليوم</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control basic"
                                        style="width: 100%;"
                                        name="day" id="day">
                                        <option value="Monday"{{old('day') == "Monday" ? 'Monday' : ''}} >Monday</option>

                                        <option value="Tuesday" {{old('day') == "Tuesday" ? 'Tuesday' : ''}}>Tuesday</option>

                                        <option value="Wednesday" {{old('day') == "Wednesday" ? 'Wednesday' : ''}}>Wednesday</option>

                                        <option value="Thursday" {{old('day') == "Thursday" ? 'Thursday' : ''}}>Thursday</option>

                                        <option value="FridaySaturday" {{old('day') == "FridaySaturday" ? 'FridaySaturday' : ''}}>FridaySaturday</option>

                                        <option value="Saturday" {{old('day') == "Saturday" ? 'Saturday' : ''}}>Saturday</option>

                                        <option value="Sunday" {{old('day') == "adult" ? 'Sunday' : ''}}>Sunday</option>


                                    </select>
                                    @error("day")
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            
                        

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
<script src="{{asset('adminAssets/plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('adminAssets/plugins/select2/select2.min.js')}}"></script>
<script>
var f4 = flatpickr(document.getElementById('from'), {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "13:45"
});
var f5 = flatpickr(document.getElementById('to'), {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "13:45"
});

</script>
<script>
    $(".basic").select2({
        tags: true,
    });
    </script>

@endsection