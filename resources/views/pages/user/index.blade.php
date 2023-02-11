@extends('master')


@push('css')
    @if(LaravelLocalization::getCurrentLocale() == 'ar')

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/plugins/table/datatable/datatables.css') }}">

        {{-- <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/plugins/table/datatable/dt-global_style.css') }}"> --}}

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/forms/theme-checkbox-radio.css') }}">

        <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" 
              rel="stylesheet" 
              type="text/css">

    @else

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">

        {{-- <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}"> --}}

        <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">
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
                            <a href="{{route('admin.user.index')}}"
                               class="d-flex justify-content-center align-items-center">

                                <i class="fa-solid fa-user-lock fa-2x mx-2"></i>
                                <span class="font-weight-bold ">المستخدمين</span>
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


            @if($errors->any())
                @push('js')
                    <script>
                        setTimeout(() => {
                            Swal.fire(
                                'Error!',
                                `There was an Error Check the form`,
                                'error'
                            )
                        }, 500);
                    </script>    
                @endpush
            @endif


            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables">
                            <h3 class="text-capitalize text-white">
                                المستخدمين
                            </h3>
                            <a data-toggle='modal' data-target='#creatUserModal' class="icon text-white">
                                <i class="fa-solid fa-plus fa-2xl"></i>
                            </a>
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
    @include('pages.user.createModal')

    @include('pages.user.editModal')
@endsection


@push('js')

    {{--Begin Data_Table--}}
    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
    {{--End Data_Table--}}

    {{--Begin Select 2 --}}
    <script src="{{ asset('adminAssets/plugins/select2/select2.min.js') }}"></script>

    <script>
        $('#role').select2({
            theme: "basic",
            dropdownParent: $('#creatUserModal'),
        });
    </script>
    <script>
        $('#editRole').select2({
            theme: "basic",
            dropdownParent: $('#editUser'),
        });
    </script>



    {{--End Select 2 --}}

    <script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>
@endpush
