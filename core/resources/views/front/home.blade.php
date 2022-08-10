@extends('layout')

@section('css')
@endsection
@section('content')
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <form action="{{route('exchange.amount')}}" method="post">
                        @csrf
                        <div class="banner-content">
                            <h1>{{$basic->section1_heading}}</h1>
                            <p>{{$basic->section1_para}}</p>

                            {{-- @include('errors.error')

                            <div class="exchange-button">
                                <input type="text" name="from_amount" class="from_amount" placeholder="0.00"
                                       autocomplete="off"
                                       onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                <select name="from_currency_id" id="from_currency_id">
                                    @foreach($currency as $data)
                                        <option value="{{$data->id}}"
                                                data-id="{{$data->id}}"
                                                data-name="{{$data->name}}"
                                                data-symbol="{{$data->symbol}}"
                                                data-price="{{$data->price}}"
                                                data-available="{{$data->available_balance}}"
                                                data-exchange="{{$data->exchange}}"
                                                data-sell="{{$data->sell}}"
                                                data-buy="{{$data->buy}}"
                                                data-paymentId="{{$data->payment_id}}"
                                        >{{$data->symbol}}</option>
                                    @endforeach
                                </select>
                                <div class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="exchange-button">
                                <input type="text" name="receive_amount" class="receive_amount" readonly
                                       placeholder="0.00" autocomplete="off"
                                       onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                <select name="receive_currency_id" id="receive_currency_id">
                                    @foreach($currency2 as $data)
                                        <option value="{{$data->id}}"
                                                data-id="{{$data->id}}"
                                                data-name="{{$data->name}}"
                                                data-symbol="{{$data->symbol}}"
                                                data-price="{{$data->price}}"
                                                data-available="{{$data->available_balance}}"
                                                data-exchange="{{$data->exchange}}"
                                                data-sell="{{$data->sell}}"
                                                data-buy="{{$data->buy}}"
                                                data-paymentId="{{$data->payment_id}}">{{$data->symbol}}</option>
                                    @endforeach
                                </select>
                                <div class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div> --}}
                        </div>

                        {{-- <div class="exchange-now">
                            <button type="submit" class="exchange-now-button">Exchange Now</button>

                        </div> --}}

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')

    <script>
        $(document).ready(function () {
            var from_amount = $(".from_amount").val();
            var receive_amount = $(".receive_amount").val();

            $(".from_amount, #from_currency_id, .receive_amount, #receive_currency_id ").on('keyup change', function () {

                var enterAmount = $(".from_amount").val();
                var fromAmountPrice = $("#from_currency_id option:selected").data('price');
                var fromAmountExchangeCharge = $("#from_currency_id option:selected").data('exchange');

                var receiveAmountPrice = $("#receive_currency_id option:selected").data('price');
                var receiveAmountExchangeCharge = $("#receive_currency_id option:selected").data('exchange');


                var getAmountTotal = parseFloat((receiveAmountPrice/ fromAmountPrice)*enterAmount);
                var chargeFromTotalAmoFromEnter = parseFloat((getAmountTotal*receiveAmountExchangeCharge)/100);
                var getAmountInput = parseFloat((getAmountTotal - chargeFromTotalAmoFromEnter));
                $(".receive_amount").val(getAmountInput.toFixed(8));
            });

        });
    </script>
@endsection
