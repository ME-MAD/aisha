<div class="card component-card_4 col-sm-12">
    <div class="card-body">
        <div class="table-responsive mb-4 mt-4">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="col-xl-2 col-md-2 col-sm-2 col-2 float-right">
                            <a data-toggle='modal' data-target='#creatGroupStudentModal' class="btn btn-primary"
                                data-href="{{ route('admin.group_students.getGroupStudents') }}"
                                id="creatGroupStudentModalInGroupShow"
                                data-group_id="{{ $group->id }}">{{ __('group.Create Group Student') }}</a>
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mb-4">
                                <thead>
                                    <tr>
                                        <th>{{ __('group.name') }}</th>
                                        <th>{{ __('group.Birthday') }}</th>
                                        <th>{{ __('group.Phone') }}</th>
                                        <th>{{ __('global.Delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group->groupStudents as $groupStudent)
                                        <tr role="row">
                                            <td class="sorting_1 sorting_2">
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        @if ($groupStudent->student->avatar)
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="{{ $groupStudent->student->avatar }}">
                                                        @else
                                                            <img src="{{ asset('images/Spare.jpg') }}"
                                                                class="img-fluid rounded-circle" class="avatar-image">
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('admin.student.show', $groupStudent->student->id) }}">
                                                        <p class="align-self-center mb-0 admin-name text-primary">
                                                            {{ $groupStudent->student->name }}</p>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $groupStudent->student->birthday }}</td>
                                            <td>{{ $groupStudent->student->phone }}</td>
                                            <td>
                                                <div>
                                                    <x-delete-link :route="route('admin.group_students.delete', $groupStudent->id)" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>