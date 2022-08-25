@extends('master')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>edit Table Days </h3>
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
                                <h4 class="text-center text-success">Edit Group Days</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.group_day.update',$groupDay->id) }}" method="post">
                        @csrf
                        @method('PUT')
                       
                            <input type="hidden" name="groupDay_id" value="{{ $groupDay->id }}">
                            
                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> اختر
                                    المجموعه</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control select2 select2-hidden-accessible group_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        name="group_id" id="group_id">
                                        <option value="">اختر اسم المجموعه</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}"
                                                {{  $groupDay->group_id == $group->id ? 'selected' : '' }}>
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
                                    <select class="form-control select2 select2-hidden-accessible teacher_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        name="day" id="day">
                                        <option value="Monday"{{ $groupDay->day == "Monday" ? 'selected' : ''}} >Monday</option>

                                        <option value="Tuesday" {{ $groupDay->day == "Tuesday" ? 'selected' : ''}}>Tuesday</option>

                                        <option value="Wednesday" {{ $groupDay->day == "Wednesday" ? 'selected' : ''}}>Wednesday</option>

                                        <option value="Thursday" {{ $groupDay->day == "Thursday" ? 'selected' : ''}}>Thursday</option>

                                        <option value="FridaySaturday" {{ $groupDay->day == "FridaySaturday" ? 'selected' : ''}}>FridaySaturday</option>

                                        <option value="Saturday" {{ $groupDay->day == "Saturday" ? 'selected' : ''}}>Saturday</option>

                                        <option value="Sunday" {{ $groupDay->day == "Sunday" ? 'selected' : ''}}>Sunday</option>


                                    </select>
                                    @error("day")
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            

                       

                           

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success mt-3">Lets Go</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

<script>
function edit() {
    document.getElementById('from').readOnly=false; 
}
</script>



@endsection
