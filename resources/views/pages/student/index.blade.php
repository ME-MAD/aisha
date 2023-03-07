@extends('master')

@push('css')
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">

    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">

    {{-- <link rel="stylesheet"
          type="text/css"
          href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}"> --}}


    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link  rel="stylesheet"
               type="text/css"
               href="{{ asset('adminRtl/plugins/file-upload/file-upload-with-preview.min.css') }}"/>
               <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
    @else
        <link  rel="stylesheet"
               type="text/css"
               href="{{ asset('adminAssets/plugins/file-upload/file-upload-with-preview.min.css') }}"/>
               <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
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
                            <span class="font-weight-bold mt-1">
                               {{trans('main.home_page')}}
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.student.index')}}"
                           class="d-flex justify-content-center align-items-center">

                            <i class="fa-solid fa-users-gear fa-2x mx-2"></i>
                            <span class="font-weight-bold ">
                              {{trans('student.students_revealed')}}
                            </span>
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
                            {{trans('main.students')}}
                        </h3>
                        @check_permission('store-student')
                        <a class="icon text-white" data-toggle="modal"
                        data-target="#creatStudentModal">
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

    @include('pages.student.createModal')

    @include('pages.student.editModal')
@endsection


@push('js')

    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    {!! $dataTable->scripts() !!}

    <script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>
    <script src="{{ asset('adminAssets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script src="{{asset('js/student.js')}}"></script>

    <script src="{{ asset('adminAssets/plugins/select2/select2.min.js') }}"></script>

    <script>
        $('.role_create').select2({
            dropdownParent: $('#creatStudentModal'),
        });
        $('.role_edite').select2({
            dropdownParent: $('#editStudent'),
        });
    </script>

    <script>
        var image_edit = new FileUploadWithPreview('image_edit')
    </script>
@endpush

