@extends('master')


@push('css')
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        {{--BreadCrumb--}}
        <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
        {{--Tabs--}}
        <link href="{{asset('adminRtl/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet"
              type="text/css">
    @else
        {{--BreadCrumb--}}
        <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
        {{--Tabs--}}
        <link href="{{asset('adminAssets/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet"
              type="text/css">
    @endif
    <link rel="stylesheet" href="{{asset('css/myCheckbox.css')}}">

@endpush

@section('breadcrumb')
    <div class="row my-3 ">
        <div class="col-md-12">
            <div class="breadcrumb bg-transparent">

                <div class="breadcrumb-four">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('admin.role.index')}}"
                               class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-house mx-2 fa-2x"></i>
                                <span class="font-weight-bold mt-1">{{__('global.home')}}</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{route('admin.role.edit' ,$role->id)}}"
                               class="d-flex justify-content-center align-items-center">

                                <i class="fa-solid fa-pen-to-square fa-2x mx-2"></i>
                                <span class="font-weight-bold mx-1">{{__('global.update')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold text-capitalize">{{__('roles.update')}}</h3>
                    </div>
                    <form action="{{ route('admin.role.update' ,$role->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active"
                                       id="animated-underline-home-tab"
                                       data-toggle="tab"
                                       href="#animated-underline-home"
                                       role="tab"
                                       aria-controls="animated-underline-home"
                                       aria-selected="true">
                                        <i class="fa-solid fa-user-gear fa-2x"></i>

                                        <span class="font-weight-bold">{{__('roles.info')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       id="animated-underline-permission-tab"
                                       data-toggle="tab"
                                       href="#animated-underline-permission"
                                       role="tab"
                                       aria-controls="animated-underline-permission"
                                       aria-selected="false">

                                        <i class="fa-solid fa-gears fa-2x"></i>

                                        <span class="font-weight-bold">{{__('roles.permissions')}}</span>

                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content " id="animateLineContent-4">
                                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                                     aria-labelledby="animated-underline-home-tab">
                                    <div class="modal-body  my-5 rounded border border-solid b-1 bg-light">

                                        @include('pages.role.partials.form')
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="animated-underline-permission" role="tabpanel"
                                     aria-labelledby="animated-underline-permission-tab">
                                    <div
                                        class="d-flex justify-content-between align-items-center mx-2 my-3 p-3 rounded bg-light">
                                        <h4 class="font-weight-bold text-capitalize
                                     text-dark">{{__('roles.give this role all permissions')}}</h4>
                                        <a> <i class="far fa-check-circle fa-2x" id="giveAllPermissions"></i></a>

                                    </div>
                                    <div class="media">
                                        <div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-4 text-center">
                                                <thead>
                                                <tr>
                                                    <th>Table</th>
                                                    <th>Create</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                    <th>show</th>
                                                    <th>index</th>

                                                </tr>
                                                </thead>
                                                <tbody id="permissionBody">
                                                @foreach (getPermissionsForView() as $table => $permissions)
                                                    <tr>
                                                        <td>
                                                            <label class="control control-checkbox">
                                                                {{$table}}
                                                                <input type="checkbox"
                                                                       name="permissions[{{$table}}][]"
                                                                       id="{{$table}}"
                                                                       class="checkAll auto"
                                                                       data-table="{{$table}}"/>

                                                                <div class="control_indicator"></div>
                                                            </label>
                                                        </td>

                                                        @foreach ($permissions as $permission)

                                                            <td>
                                                                <label class="control control-checkbox">
                                                                    <span class="opacity-0">Hello</span>

                                                                    <input
                                                                        type="checkbox"
                                                                        class="permissionCheckbox"
                                                                        name="permissions[{{$table}}][]"
                                                                        value="{{$permission['value'] }}"
                                                                        data-table="{{$table}}"
                                                                        {{in_array($permission['value'], $rolePermissions) ? 'checked' : ''}}
                                                                        />

                                                                    <div class="control_indicator"></div>
                                                                </label>
                                                            </td>

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
                        <div class="card-footer">
                            <button type="button"
                                    class="btn btn-danger font-weight-bold text-white"
                                    data-dismiss="modal">{{__('global.Close')}}
                            </button>

                            <button type="submit"
                                    class="btn btn-success font-weight-bold text-white">{{__('global.Update')}}
                            </button>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
        let allChecked = false;
        
        $('#giveAllPermissions').on('click', function (e) {
            e.preventDefault();

            if (!allChecked) 
            {
                $('.permissionCheckbox').prop('checked', true);
                $('.checkAll').prop('checked', true);
                $('#giveAllPermissions').css({
                    color: '#515365',
                });
                allChecked = true;
            } 
            else 
            {
                $('.permissionCheckbox').prop('checked', false);
                $('.checkAll').prop('checked', false);
                $('#giveAllPermissions').css({
                    color: '#e95f2b',
                });
                allChecked = false;
            }
        })

    </script>

    <script>


        // make all checkbox checked when click on checkAll
        $('.checkAll').on('change', function () {

            let table = $(this).data('table')

            if (this.checked == true) {
                $(`input[name='permissions[${table}][]']`).prop('checked', true)
            } else {
                $(`input[name='permissions[${table}][]']`).prop('checked', false)
            }
        })

        // check if all checkbox is checked then make checkAll checked
        $(".permissionCheckbox").change(function () {

            let table = $(this).data('table')
            let allCheckboxes = document.querySelectorAll(`input[name='permissions[${table}][]']:not([id="${table}"])`);
            let checkboxChecked = document.querySelectorAll(`input[name='permissions[${table}][]']:not([id="${table}"]):checked`);

            if (allCheckboxes.length == checkboxChecked.length) {
                $(`input[name='permissions[${table}][]']`).prop('checked', true);

                $('#giveAllPermissions').css({
                    color: '#e95f2b',
                });

            } else {
                $(`#${table}`).prop('checked', false);

                $('#giveAllPermissions').css({
                    color: '#515365',
                });
            }

        });

    </script>

@endpush

