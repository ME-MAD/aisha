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
    <div class="container-fluid">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center text-primary">Edit Teacher</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.teacher.update',$teacher->id) }}" method="post">
                            @csrf
                        @method('PUT')

                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

                            <div class="form-group row mb-4">
                                <label for="name"
                                    class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">الإسم</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$teacher->name}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="birthday" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">تاريخ
                                    الميلاد</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="date" class="form-control" id="birthday" placeholder=""
                                        name="birthday" value="{{$teacher->birthday}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="phone"
                                    class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">الهاتف</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="phone" placeholder="" name="phone" value="{{$teacher->phone}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="qualification"
                                    class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">المؤهل</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="qualification" placeholder="" name="qualification" value="{{$teacher->qualification}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="note"
                                class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">ملاحظة</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <textarea class="form-control" name="note" id="" cols="30" rows="10" value="{{$teacher->note}}">
                                       
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary mt-3">Lets Go</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
