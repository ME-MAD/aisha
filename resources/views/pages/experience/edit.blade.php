@extends('master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('adminAssets/plugins/select2/select2.min.css')}}">
<link href="{{asset('adminAssets/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('adminAssets/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Edit experience</h3>
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
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.teacher.index') }}">Teachers</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.teacher.create') }}">Create Teacher</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.experience.create') }}">Create experience</a>
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
                                <h4 class="text-center text-primary">Edit experience</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.experience.update',$experience->id) }}" method="post">
                            @csrf
                            @method('PUT')

                             <input type="hidden" name="experience_id" value="{{ $experience->id }}">

                            


                            <x-text name="title" label="العنوان" :value="$experience->title" />

                            <x-date name="date" id="date" label="التاريخ" :value=" $experience->date->format('Y-m-d')" />


                            <div class="form-group row mb-4">
                              <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> اختر
                                  المعلم</label>
                              <div class="col-xl-10 col-lg-9 col-sm-10">
                                  <select class="form-control basic"
                                      style="width: 100%;"
                                      name="teacher_id" id="teacher_id">
                                      <option value="">اختر المعلم</option>
                                      @foreach ($teachers as $teacher)
                                          <option value="{{ $teacher->id }}"
                                              {{$experience->teacher_id == $teacher->id ? 'selected' : '' }}>
                                              {{ $teacher->name }}</option>
                                      @endforeach
                                  </select>
                                  @error("teacher_id")
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

<script src="{{asset('adminAssets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('adminAssets/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('adminAssets/plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('adminAssets/plugins/flatpickr/custom-flatpickr.js')}}"></script>
<script>
$(".basic").select2({
    tags: true,
});
</script>
<script>
    var f1 = flatpickr(document.getElementById('date'),{
        maxDate: getPreviousDay()
    });

    function getPreviousDay(date = new Date()) {
        const previous = new Date(date.getTime());
        previous.setDate(date.getDate() - 1);
        return previous;
    }
</script>

@endsection