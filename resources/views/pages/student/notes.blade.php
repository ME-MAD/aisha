@extends('master')



@push('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('adminAssets/assets/css/apps/notes.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('adminAssets/assets/css/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endpush


@section('breadcrumb')
@endsection



@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row app-notes layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="app-hamburger-container">
                        <div class="hamburger">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </div>

                    <div class="app-container">

                        <div class="app-note-container">

                            <div class="app-note-overlay"></div>

                            <div class="tab-title">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <a id="btn-add-notes" class="btn btn-primary" href="javascript:void(0);">Add</a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 mt-5">
                                        <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link list-actions active" id="all-notes"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                    All Notes
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link list-actions" id="note-fav"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-star">
                                                        <polygon
                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg>
                                                    Favourites
                                                </a>
                                            </li>
                                        </ul>

                                        <hr />

                                        <p class="group-section">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                                                <path
                                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                                </path>
                                                <line x1="7" y1="7" x2="7" y2="7"></line>
                                            </svg>
                                            Tags
                                        </p>

                                        <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-primary" id="note-personal">
                                                    Personal
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-warning" id="note-work">
                                                    Work
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-success" id="note-social">
                                                    Social
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-danger" id="note-important">
                                                    Important
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>




                            <div id="content-notes" class="note-container note-grid">

                            </div>



                        </div>


                        <!-- User Paginating Content-->
                        <div id="paginating-container"></div>
                    </div>










                    <!-- Modal -->
                    <div class="modal fade" id="notesMailModal" tabindex="-1" role="dialog"
                        aria-labelledby="notesMailModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"
                                        data-dismiss="modal">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    <div class="notes-box">
                                        <div class="notes-content">
                                            <form action="javascript:void(0);" id="notesMailModalTitle">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="d-flex" id="content-type">
                                                            <!--content-type-->
                                                        </div>
                                                        <span class="validation-text">fdsdgssg</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="d-flex" id="content-student">
                                                            <!--content-type-->
                                                        </div>
                                                        <span class="validation-text">fdsdgssg</span>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="d-flex note-description">
                                                            <textarea class="form-control" placeholder="Description" rows="3" id="input-note">
                                                            </textarea>
                                                        </div>
                                                        <span class="validation-text"></span>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-n-save" class="float-left btn">Save</button>
                                    <button class="btn" data-dismiss="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg> Discard</button>
                                    <button id="btn-n-add" class="btn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>



    </div>
    <!-- END MAIN CONTAINER -->
@endsection


@push('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('adminAssets/assets/js/ie11fix/fn.fix-padStart.js') }}"></script>
    <script src="{{ asset('js/notes.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script src="{{ asset('adminAssets/plugins/select2/select2.min.js') }}"></script>
    {{-- <script>
        var ss = $(".basic").select2({
            tags: true,
        });
    </script> --}}
@endpush
