@extends('layout')
@section('content')
{{-- banner --}}
<div class="page-title-area">
    <div class="container">
        <div class="page-title">
            <h1 class="pb-0 mb-0">{{$page_title}}</h1>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container ">

    <div class="row">
        {{-- <div class="col-md-12">
            <h2 class="float-left">Seller Conditions</h2>
            <p class="float-right">
                <a href="" class="btn btn-primary">New Bid <i class="fa fa-plus" aria-hidden="true"></i> </a>
            </p>
        </div>
        <div class="col-12">
            <hr>
        </div> --}}
        <div class="col-md-5">
            <div class="card-header bg-primary text-white">
                <h2>Seller Trade Details</h2>

            </div>
            <div class="card border-0">
                <div class="card-body p-0">
                    {{-- <h5 class="card-title text-secondary">Exchange Trade Percentages</h5> --}}
                    <p class="card-text">
                        <ul class="list-group">
                            @php
                                // json decode the trade seller_trade_modes
                                $trade_seller_trade_modes = json_decode($trade->seller_trade_modes);
                            @endphp
                            @foreach ($trade_seller_trade_modes as $item => $val)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$item}}
                                <span class="badge badge-primary">{{$val}} %</span>
                            </li>
                            @endforeach

                        </ul>
                    </p>
                    {{-- <h5 class="card-title text-secondary">Trade Details</h5> --}}

                    <table class="border table">
                        <tbody>
                            <tr class="bg-light border-white">
                                <td>Instrument</td>
                                <td class="text-info">{{$trade->instrument->name}}</td>
                            </tr>
                            <tr class="bg-light border-white">
                                <td>Currency</td>
                                <td>{{$trade->currency->name}}</td>
                            </tr>
                            <tr class="bg-light border-white">
                                <td>Amount</td>
                                <td class=""><b class="text-info">{{number_format($trade->amount)}}</b></td>
                            </tr>
                            <tr class="bg-light border-white">
                                <td>Satus</td>
                                <td>
                                    @if($trade->status == 'private')
                                        <span class="badge badge-danger">{{$trade->status}}</span>
                                    @elseif($trade->status == 'public' || $trade->status == 'open')
                                        <span class="badge badge-success">{{$trade->status}}</span>
                                    @elseif($trade->status == 'closed')
                                        <span class="badge badge-dark">{{$trade->status}}</span>
                                    @else
                                        <span class="badge badge-warning">{{$trade->status}}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="bg-light border-white">
                                <td>Selling Date</td>
                                <td class="text-info">{{$trade->selling_date}}</td>
                            </tr>
                            <tr class="bg-light border-white">
                                <td>Expected Date</td>
                                <td>{{$trade->expected_date}}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <h5 class="card-title text-secondary">Acceptance Details</h5> --}}

                    <table class="border table">
                        <tbody>

                            <tr>
                                <td>Seller Accept</td>
                                <td><span class="badge badge-light text-danger">No</span></td>
                            </tr>
                            <tr>
                                <td>Buyer Accept</td>
                                <td><span class="badge badge-light text-danger">No</span></td>
                            </tr>
                            <tr>
                                <td>Admin Accept</td>
                                <td><span class="badge badge-light text-danger">No</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7 p-0">
            <div class="card border-0 ">
                <div class="card-header bg-success text-white">
                    <h2>Buyer Bids</h2>
                </div>
                <div class="card-body bg-light" style="overflow: scroll">
                    <div class="col-12 p-0">
                        <div class="card p-0 col-12 ">
                          <div class="card-body">
                            <h4 class="card-title float-left mb-0 text-success">50000 AED </h4>
                            <p class="card-text float-right mb-0">2 Days Ago</p>

                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
