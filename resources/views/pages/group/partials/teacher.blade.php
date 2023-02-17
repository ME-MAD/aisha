{{-- <div class="card component-card_4 col-sm-12">
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
</div> --}}

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
            <h3 class="text-capitalize text-white">
               المدرس
            </h3>
            <a class="icon text-white mt-2 editTeacherButton" data-toggle='modal' data-target='#editTeacher'
            data-teacher="{{ $group->teacher }}" data-href="{{ route('admin.teacher.update', $group->teacher->id) }}">
            <i class="fa-solid fa-pen-to-square fa-2xl"></i>
         </a>
        </div>
        <div class="card-body"  >
            <div class="user-profile">
              
            </div>
            <div class="user-info-list">
                <div class="text-center user-info">
                    <img src="{{ asset('adminAssets/assets/img/mother.png') }}" class="" alt="..." style="width: 200px">
                </div>
                <div class="user-info-list">
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">
                                {{ __('group.Teacher Name') }} 
                            </th>
                            <td>
                                {{ $group->teacher->name }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                                {{ __('group.Birthday') }}
                            </th>
                            <td> 
                                {{ $group->teacher->birthday }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                                {{ __('group.Age Type') }}
                            </th>
                            <td> 
                                {{ $group->age_type }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                                {{ __('group.Teacher phone') }}
                            </th>
                            <td> 
                                {{ $group->teacher->phone }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                                {{ __('group.Qualification') }}
                            </th>
                            <td> 
                                {{ $group->teacher->qualification }}
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



