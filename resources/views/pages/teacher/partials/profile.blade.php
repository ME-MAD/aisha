<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
            <h3 class="text-capitalize text-white">
                {{ __('teacher.Info') }}
            </h3>
            <a class="icon text-white mt-2 editTeacherButton" data-toggle='modal' data-target='#editTeacher'
            data-teacher="{{ $teacher }}" data-href="{{ route('admin.teacher.update', $teacher->id) }}">
            <i class="fa-solid fa-pen-to-square fa-2xl"></i>
         </a>
        </div>
        <div class="card-body"  >
            <div class="text-center user-info">
                @if ($teacher->avatar)
                    <img src="{{ $teacher->avatar }}" alt="" class="avatar-image">
                @else
                    <img src="{{ asset('images/Spare.jpg') }}" alt="" class="avatar-image">
                @endif
                <h3 class="">{{ $teacher->name }}</h3>
            </div>
            <div class="user-info-list">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">
                            {{-- <i class="fa-solid fa-user-graduate fa-xl"></i> --}}
                            <h6 class="text-secondary">المؤهل</h6>
                        </th>
                        <td>
                            {{ $teacher->qualification }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            {{-- <i class="fa-regular fa-envelope fa-xl"></i> --}}
                            <h6 class="text-secondary">البريد الإلكتروني</h6>
                        </th>
                        <td> 
                            {{ $teacher->email }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                             {{-- <i class="fa-solid fa-phone fa-xl"></i> --}}
                             <h6 class="text-secondary">الهاتف</h6>
                        </th>
                        <td> 
                            {{  $teacher->phone }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            {{-- <i class="fa-regular fa-calendar fa-xl"></i> --}}
                            <h6 class="text-secondary">تاريخ الميلاد</h6>
                        </th>
                        <td> 
                             {{ $teacher->birthday }}
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

