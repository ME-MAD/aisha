@extends('master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/select2/select2.min.css') }}">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row invoice layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="app-hamburger-container">
                        <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-menu chat-menu d-xl-none">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg></div>
                    </div>
                    <div class="doc-container">
                        <div class="tab-title">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="search">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <ul class="nav nav-pills inv-list-container d-block ps ps--active-y" id="pills-tab"
                                        role="tablist">
                                        @foreach ($gorups as $gorup)
                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00001"
                                                    data-invoice-id="00001">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-dollar-sign">
                                                                <line x1="12" y1="1" x2="12"
                                                                    y2="23"></line>
                                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00001</p>
                                                            <p class="invoice-customer-name badge bg-primary text-light">
                                                                <span class="text-light">From:</span>{{ $gorup->from }}
                                                            </p>
                                                            <p class="invoice-customer-name badge bg-primary text-light">
                                                                <span class="text-light">To:</span>
                                                                {{ $gorup->to }}
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach




                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; height: 409px; right: 0px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 112px;">
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-container">
                            <div class="invoice-inbox ps ps--active-y" style="height: calc(100vh - 215px);">

                                <div class="inv-not-selected" style="display: none;">
                                    <p>Open an invoice from the list.</p>
                                </div>

                                <div class="invoice-header-section" style="display: flex;">
                                    <h4 class="inv-number">#00003</h4>
                                    <div class="invoice-action">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-printer action-print" data-toggle="tooltip"
                                            data-placement="top" data-original-title="Reply">
                                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                            <path
                                                d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                            </path>
                                            <rect x="6" y="14" width="12" height="8"></rect>
                                        </svg>
                                    </div>
                                </div>

                                <div id="ct" class="" style="display: block;">

                                    <div class="invoice-00001" style="display: none;">
                                        <div class="content-section  animated animatedFadeInUp fadeInUp">

                                            <div class="row inv--head-section">

                                                <div class="col-sm-6 col-12">
                                                    <h3 class="in-heading">INVOICE</h3>
                                                </div>
                                                <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                    <div class="company-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-hexagon">
                                                            <path
                                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                            </path>
                                                        </svg>
                                                        <h5 class="inv-brand-name">CORK</h5>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row inv--detail-section">

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-to">Invoice To</p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                    <p class="inv-detail-title">From : XYZ Company</p>
                                                </div>

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-customer-name">Jesse Cory</p>
                                                    <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                    <p class="inv-email-address">redq@company.com</p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                    <p class="inv-list-number"><span class="inv-title">Invoice Number :
                                                        </span> <span class="inv-number">#00003</span></p>
                                                    <p class="inv-created-date"><span class="inv-title">Invoice Date :
                                                        </span> <span class="inv-date">20 Aug 2020</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Due Date : </span>
                                                        <span class="inv-date">26 Aug 2020</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row inv--product-table-section">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Items</th>
                                                                    <th class="text-right" scope="col">Qty</th>
                                                                    <th class="text-right" scope="col">Unit Price</th>
                                                                    <th class="text-right" scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Electric Shaver</td>
                                                                    <td class="text-right">20</td>
                                                                    <td class="text-right">$300</td>
                                                                    <td class="text-right">$2800</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Earphones</td>
                                                                    <td class="text-right">49</td>
                                                                    <td class="text-right">$500</td>
                                                                    <td class="text-right">$7000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Wireless Router</td>
                                                                    <td class="text-right">30</td>
                                                                    <td class="text-right">$500</td>
                                                                    <td class="text-right">$3500</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                    <div class="inv--payment-info">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-12">
                                                                <h6 class=" inv-title">Payment Info:</h6>
                                                            </div>
                                                            <div class="col-sm-4 col-12">
                                                                <p class=" inv-subtitle">Bank Name: </p>
                                                            </div>
                                                            <div class="col-sm-8 col-12">
                                                                <p class="">Bank of America</p>
                                                            </div>
                                                            <div class="col-sm-4 col-12">
                                                                <p class=" inv-subtitle">Account Number : </p>
                                                            </div>
                                                            <div class="col-sm-8 col-12">
                                                                <p class="">1234567890</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="inv--total-amounts text-sm-right">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Sub Total: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">$13300</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Tax Amount: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">$700</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Discount : <span
                                                                        class="discount-percentage">5%</span> </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">$700</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="">Grand Total : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="">$14000</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>


                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 50px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 3px;"></div>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 50px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 3px;"></div>
                                </div>
                            </div>

                            <div class="inv--thankYou" style="display: block;">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <p class="">Thank you for doing Business with us.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>,
                    All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></p>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('adminAssets/assets/js/apps/invoice.js') }}"></script>
@endsection
