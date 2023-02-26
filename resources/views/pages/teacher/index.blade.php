@extends('master')

@push('css')

    @if(LaravelLocalization::getCurrentLocale() == 'ar')

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/plugins/table/datatable/datatables.css') }}">

              <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/forms/theme-checkbox-radio.css') }}">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/plugins/file-upload/file-upload-with-preview.min.css') }}"/>
    @else

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">

              <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/plugins/file-upload/file-upload-with-preview.min.css') }}"/>
    @endif

    <link rel="stylesheet"
    type="text/css"
    href="{{ asset('adminAssets/plugins/select2/select2.min.css') }}">
@endpush

@section('breadcrumb')
<div class="row my-3 ">
    <div class="col-md-12">
        <div class="breadcrumb bg-transparent">

            <div class="breadcrumb-four">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('admin.home')}}"
                           class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-house mx-2 fa-2x"></i>
                            <span class="font-weight-bold mt-1">{{__('global.home')}}</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.teacher.index')}}"
                           class="d-flex justify-content-center align-items-center">

                            <i class="fa-solid fa-users fa-2x mx-2"></i>
                            <span class="font-weight-bold ">أعضاء التدريس</span>
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

        @include('pages.errorCreate')

        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables">
                        <h3 class="text-capitalize text-white">
                            {{ __('teacher.Teachers') }}
                        </h3>
                        @check_permission('store-teacher')
                        <a class="icon text-white" data-toggle="modal" 
                        data-target="#creatTeacherModal">
                            <i class="fa-solid fa-plus fa-2xl"></i>
                        </a>
                        @endcheck_permission
                    </div>
                    <div class="card-body">
                        {!! $dataTable->table
                            ([
                                     'class' => 'table table-striped dt-table-hover dataTable ',
                                     'style' => 'width:100%'
                                 ],true,
                            )
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.teacher.createModal')

    @include('pages.teacher.editModal')
@endsection


@push('js')
    {{--Begin Data_Table--}}
    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
    {{--End Data_Table--}}


    <script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>

    <script src="{{ asset('adminAssets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        var image_create = new FileUploadWithPreview('image_create')
        var image_edit = new FileUploadWithPreview('image_edit')
    </script>

    <script src="{{ asset('adminAssets/plugins/select2/select2.min.js') }}"></script>

    <script>
        $('.role_create').select2({
            dropdownParent: $('#creatTeacherModal'),
        });
        $('.role_edit').select2({
            dropdownParent: $('#editTeacher'),
        });
    </script>

@endpush