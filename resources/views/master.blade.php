@include('layout.head')
@include('layout.header')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>


    @include('layout.navbar')





    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">


            @yield('breadcrumb')

            <div class="row layout-top-spacing">

                @yield('content')

            </div>


@include('layout.footer')