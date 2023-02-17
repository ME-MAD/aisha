<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
            <h3 class="text-capitalize text-white">
                {{ __('teacher.Info') }}
            </h3>
            <a class="icon text-white mt-2 editStudentButton" data-toggle='modal' data-target='#editStudent'
            data-student="{{ $student }}" data-href="{{ route('admin.student.update', $student->id) }}">
            <i class="fa-solid fa-pen-to-square fa-2xl"></i>
         </a>
        </div>
        <div class="card-body"  >
            <div class="text-center user-info">
                @if ($student->avatar)
                    <img src="{{ $student->avatar }}" alt="" class="avatar-image">
                @else
                    <img src="{{ asset('images/Spare.jpg') }}" alt="" class="avatar-image">
                @endif
                    <h3 class="">{{ $student->name }}<h3>
            </div>
            <div class="user-info-list">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">
                            <i class="fa-solid fa-user-graduate fa-xl"></i>
                        </th>
                        <td>
                            {{ $student->qualification }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <i class="fa-regular fa-envelope fa-xl"></i>
                        </th>
                        <td> 
                           {{ $student->email }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                             <i class="fa-solid fa-phone fa-xl"></i>
                        </th>
                        <td> 
                            {{ $student->birthday }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <i class="fa-regular fa-calendar fa-xl"></i>
                        </th>
                        <td> 
                            {{ $student->phone }}
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>