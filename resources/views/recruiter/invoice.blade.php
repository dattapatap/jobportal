@extends('recruiter.layout.layout')
@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 80px;
                top: 15%;
                width: 90%;
                bottom: -100%;
            }
        }

    </style>
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Invoice</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Transaction</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
            </div>
            <div class="row " id="section-to-print">
                <div class="col-md-12">
                    <div class="card">
                        @php
                            use Carbon\Carbon;
                            $help = new Helper();
                            $invoiceNum = $help->generator('IPJ', $selPackage->id);
                        @endphp
                        <div class="card-body">
                            <div class="row  mt-5">
                                <div class="col-lg-6 col-md-6 ">
                                    <p class="h3">{{ $billAddress->name }}</p>
                                    <address style="max-width: 50%;">
                                        {{ $billAddress->address }}
                                        <br><br>
                                        {{ $billAddress->email }}
                                    </address>
                                    <hr class="mt-0 mb-0">
                                </div>
                                <div class="col-lg-6 col-md-6 text-right">
                                    <p class="h3">Invoice To</p>
                                    <p class="h4">{{ $billAddress->name }}</p>
                                    <address style="max-width: 50%; float: right;">
                                        {{ $selPackage->emp->location }}
                                        <br><br>
                                        {{ $selPackage->emp->location }}
                                    </address>
                                </div>
                            </div>

                            <div class=" text-dark">
                                <p class="mb-1 mt-5"><span class="font-weight-semibold">Invoice :</span>
                                    {{ $invoiceNum }}</p>
                                <p class="mb-1 mb-4"><span class="font-weight-semibold">Date :</span>
                                    {{ \Carbon\Carbon::parse($selPackage->payment->payment_date)->format('d-m-Y') }} </p>
                            </div>
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <tr>
                                        <th class="text-center "></th>
                                        <th>Item Lists</th>
                                        <th class="text-center">Qanitiy</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <p class="font-w600 mb-1">Package</p>
                                            <div class="text-muted">{!! $selPackage->package->name . ' - ' . $selPackage->package->amount !!} </div>
                                        </td>
                                        <td class="text-center">1</td>

                                        <td class="text-right">{!! \Helper::getActualPrice(18, $payments->payment_amount) !!}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="font-w600 text-right">Total</td>
                                        <td class="text-right">{!! \Helper::getActualPrice(18, $payments->payment_amount) !!}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="font-w600 text-right">GST 18%</td>
                                        <td class="text-right"> {!! \Helper::getPercent2(18, \Helper::getActualPrice(18, $payments->payment_amount)) !!} </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="font-weight-semibold text-uppercase text-right">SubTotal</td>
                                        <td class="font-weight-semibold text-right">{{ $payments->payment_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <!-- <button type="button" class="btn btn-pink"><i class="icon icon-wallet"></i> Pay Invoice</button>
                                            <button type="button" class="btn btn-primary" onClick="javascript:window.print();"><i class="icon icon-paper-plane"></i> Send Invoice</button> -->
                                            <!--  <button type="button" class="btn btn-info" onClick="printDiv();"><i class="icon icon-printer"></i> Print Invoice</button> -->
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <p class="text-muted text-center">Thank you very much for doing business with us. We look
                                forward to working with you again!</p>
                        </div>

                    </div>
                </div>
            </div>
            <table class="table table-bordered table-hover text-nowrap">
                <tr>
                    <td colspan="4" class="text-right">
                        <button type="button" class="btn btn-info" onClick="javascript:window.print()"><i
                            class="icon icon-printer"></i> Print Invoice</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        function printDiv() {


        }
    </script>

@endsection
