<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="zero-config_length"><label>Results : <select
                                name="zero-config_length" aria-controls="zero-config" class="form-control">
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select></label></div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="zero-config_filter" class="dataTables_filter"><label><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg><input type="search" class="form-control" placeholder="Search..."
                                aria-controls="zero-config"></label></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="zero-config" class="table table-hover dataTable" style="width: 100%;" role="grid"
                        aria-describedby="zero-config_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc text-center" tabindex="0" aria-controls="zero-config"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 176px;">Name
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="zero-config"
                                    rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 274px;">
                                    Birthday</th>
                                <th class="sorting text-center" tabindex="0" aria-controls="zero-config"
                                    rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                    style="width: 125px;">Phone</th>
                                <th class="sorting text-center" tabindex="0" aria-controls="zero-config"
                                    rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                    style="width: 125px;">Action</th>




                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupStudents->groupStudents as $groupStudent)
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
                        <tfoot>

                            <tr>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Birthday</th>
                                <th rowspan="1" colspan="1">Phone</th>
                                <th rowspan="1" colspan="1">Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing
                        page 1 of 4</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="zero-config_previous"><a
                                    href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0"
                                    class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-left">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg></a></li>
                            <li class="paginate_button page-item active"><a href="#"
                                    aria-controls="zero-config" data-dt-idx="1" tabindex="0"
                                    class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="zero-config"
                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="zero-config"
                                    data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="zero-config"
                                    data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item next" id="zero-config_next"><a href="#"
                                    aria-controls="zero-config" data-dt-idx="5" tabindex="0"
                                    class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
