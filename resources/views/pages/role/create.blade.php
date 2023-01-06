@extends('master')


@push('css')
    {{--BreadCrumb--}}
    <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
    {{--Tabs--}}
    <link href="{{asset('adminAssets/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet"
          type="text/css">

@endpush

@section('breadcrumb')
    <div class="row my-3 ">
        <div class="col-md-12">
            <div class="breadcrumb bg-transparent">

                <div class="breadcrumb-four">
                    <ul class="breadcrumb">
                        <li>
                            <a href="javscript:void(0);">
                                <i class="fa-solid fa-house"></i>
                            </a>
                        </li>
                        <li class="active">
                            <a href="javscript:void(0);">
                                <i class="fa-solid fa-house"></i>
                                Components
                            </a>
                        </li>
                        <li>
                            <a href="javscript:void(0);">
                                <i class="fa-solid fa-house"></i>
                                UI Kit
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
                        <h3 class="font-weight-bold text-capitalize">Create Role</h3>
                    </div>
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
                                    <i class="fa-solid fa-plus fa-2xl"></i>

                                    Role Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   id="animated-underline-profile-tab"
                                   data-toggle="tab"
                                   href="#animated-underline-profile"
                                   role="tab"
                                   aria-controls="animated-underline-profile"
                                   aria-selected="false">

                                    <i class="fa-solid fa-plus fa-2xl"></i>

                                    Role Permissions
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content" id="animateLineContent-4">
                            <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                                 aria-labelledby="animated-underline-home-tab">

                                <form action="{{ route('admin.role.store') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group mb-3">

                                            <x-text name="name"
                                                    label="{{__('roles.create name')}}"
                                                    class="text-capitalize text-muted "
                                                    :value="old('name')"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <x-text name="display_name" label="{{__('roles.create display_name')}}"
                                                    class="text-capitalize text-muted "
                                                    :value="old('display_name')"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <x-textarea name="description"
                                                        label="{{__('roles.create description')}}"
                                                        class="text-capitalize text-muted "
                                                        :value="old('description')"/>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-danger font-weight-bold text-white"
                                                data-dismiss="modal">{{__('globalWorld.Close')}}</button>
                                        <button type="submit"
                                                class="btn btn-primary font-weight-bold text-white">{{__('globalWorld.create')}}</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="animated-underline-profile" role="tabpanel"
                                 aria-labelledby="animated-underline-profile-tab">
                                <div class="media">

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <h4>Test</h4>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@push('js') @endpush

