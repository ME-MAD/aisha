<div class="card component-card_4 col-sm-12">
    <div class="card-body">
        <div class="user-profile">
            <img src="{{ asset('adminAssets/assets/img/mother.png') }}" class="" alt="..." style="width: 200px">
            <br>
            <br>
            <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                    <a class="mt-2 editTeacherButton" data-toggle='modal' data-target='#editTeacher'
                    data-teacher="{{ $group->teacher }}" data-href="{{ route('admin.teacher.update',$group->teacher->id) }}">
                     <i class="fa-solid fa-user-pen text-primary fa-2x"></i>
                 </a>
            </div>
        </div>

        <div class="user-info">
            <h5>{{ __('group.Teacher Name') }} :</h5>
            <h6 class="text-primary">{{ $group->teacher->name }}</h6>
            <br>
            <h5> {{ __('group.Birthday') }} :</h5>
            <h6 class="text-primary">{{ $group->teacher->birthday }}</h6>
            <br>
            <h5>{{ __('group.Age Type') }} :</h5>
            <h6 class="text-primary">{{ $group->age_type }}</h6>
            <br>
            <h5>{{ __('group.Teacher phone') }} :</h5>
            <h6 class="text-primary"> {{ $group->teacher->phone }}</h6>
            <br>
            <h5>{{ __('group.Qualification') }} :</h5>
            <h6 class="text-primary">{{ $group->teacher->qualification }}</h4>
        </div>

    </div>
</div>
