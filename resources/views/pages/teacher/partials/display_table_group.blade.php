<div class="work-experience layout-spacing">
    <div class="widget-content widget-content-area">
        <h3 class="">Teacher's Groups</h3>
        <div class="table-responsive">

            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="zero-config" class="table table-hover dataTable">
                                    <thead>
                                        <tr class="">
                                            <th class="text-center">#</th>
                                            <th>Time Group </th>
                                            <th>Ege Type </th>
                                            <th>Count Student </th>
                                            <th>Name Group Type</th>
                                            <th>Day Number </th>
                                            <th class="text-center">Days </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $group)
                                            <tr class="">

                                                <td class="text-center">{{ $group->id }}</td>
                                                <td class="text-center">{{ $group->getFrom() }} : {{ $group->getTo() }}
                                                </td>
                                                <td class="text-center">{{ $group->age_type }}</td>
                                                <td class="text-center">{{ $group->groupStudents->count() }}</td>
                                                <td class="text-center">{{ $group->groupType->name ?? '' }}</td>
                                                <td class="text-center">{{ $group->groupType->days_num ?? '' }}</td>
                                                @foreach ($group->groupDays as $groupDay)
                                                    <td class="text-center">{{ $groupDay->day }}</td>
                                                @endforeach
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
</div>
