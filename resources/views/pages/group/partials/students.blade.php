<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="zero-config" class="table table-hover dataTable">
                        <thead>
                            <tr role="row">
                                <th>Name</th>
                                <th>BirthDay</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($group->groupStudents as $groupStudent)
                                <tr role="row">
                                    <td class="text-center">{{ $groupStudent->student->name }}</td>
                                    <td class="text-center">{{ $groupStudent->student->birthday }}</td>
                                    <td class="text-center">{{ $groupStudent->student->phone }}</td>
                                    <td class="text-center">
                                        <div class="text-center">
                                            <x-edit-link :route="route('admin.group.edit', $groupStudent->student->id)" />
                                            <br>
                                            <x-delete-link :route="route('admin.group.delete', $groupStudent->student->id)" />
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
