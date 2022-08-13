@extends('master')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Create Teacher</h3>
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
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table id="style-3" class="table style-3 table-hover dataTable no-footer" role="grid"
                                    aria-describedby="style-3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="checkbox-column text-center sorting_asc" tabindex="0"
                                                aria-controls="style-3" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label=" Record Id : activate to sort column descending"
                                                style="width: 71.2031px;"> # </th>
                                            <th class="text-center sorting" tabindex="0" aria-controls="style-3"
                                                rowspan="1" colspan="1"
                                                aria-label="Image: activate to sort column ascending"
                                                style="width: 46.2812px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1"
                                                colspan="1" aria-label="First Name: activate to sort column ascending"
                                                style="width: 82.0156px;">Birthday</th>
                                            <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1"
                                                colspan="1" aria-label="Last Name: activate to sort column ascending"
                                                style="width: 80.6719px;">Phone</th>
                                            <th class="sorting" tabindex="0" aria-controls="style-3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending"
                                                style="width: 118.953px;">Note</th>
                                            <th class="text-center dt-no-sorting sorting" tabindex="0"
                                                aria-controls="style-3" rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending"
                                                style="width: 56.5625px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>







                                        <tr role="row">
                                            <td class="checkbox-column text-center sorting_1"> 1 </td>
                                            <td class="text-center">
                                                <span><img src="assets/img/90x90.jpg" class="profile-img"
                                                        alt="avatar"></span>
                                            </td>
                                            <td>Donna</td>
                                            <td>Rogers</td>
                                            <td>donna@yahoo.com</td>

                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <li><a href="#">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="52"
                                                                height="52" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="3"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10"
                                                                    y2="17"></line>
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17"></line>
                                                            </svg>
                                                        </a></li>
                                                    <li>
                                                        <form method="POST" action="">
                                                            @csrf
                                                            @method('DELETE')

                                                            <input type="hidden" name="" value="">

                                                            <button class="btn btn-outline-danger">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
