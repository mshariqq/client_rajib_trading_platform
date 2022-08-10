@extends('layout')

@section('css')
@endsection
@section('content')
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div method="post">
                        @csrf
                        <div class="banner-content">
                            <h1>{{$basic->section1_heading}}</h1>
                            <p>{{$basic->section1_para}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- new trade order --}}
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mt-5 mb-5">
                <h2>Create New Trade Order</h2>
                <form action="{{route('trade.store')}}" method="POST" class="card border-none border-0">
                    @csrf
                    <div class="card-body">
                        {{-- select instruments dropdown --}}
                        <div class="form-group">
                            <label for="instrument">Select Instrument Type</label>
                            <select name="instrument" id="instrument" class="form-control">
                                @foreach($instruments as $instrument)
                                    <option value="{{$instrument->id}}">{{$instrument->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         {{-- select instruments dropdown --}}
                         <div class="form-group">
                            <label for="currency">Select Instrument Type</label>
                            <select name="currency" id="currency" class="form-control">
                                @foreach($currency as $instrument)
                                    <option value="{{$instrument->id}}">{{$instrument->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- form amount --}}
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="0.00"
                                   autocomplete="off"
                                   onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                        </div>
                        {{-- form selling_date input date --}}
                        <div class="form-group">
                            <label for="selling_date">Selling Date</label>
                            <input type="date" name="selling_date" id="selling_date" class="form-control">
                        </div>
                        {{-- expected date  --}}
                        <div class="form-group">
                            <label for="expected_date">Expected Date</label>
                            <input type="date" name="expected_date" id="expected_date" class="form-control">
                        </div>
                        {{-- form select for status --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="draft">Pending</option>
                                <option value="public">Completed</option>
                            </select>
                        </div>
                        <div class="col-12 p-0">
                            <h4 class="pt-4 pb-2">Expected Recieve Modes & Percentages</h4>
                            @foreach ($tradeMode as $item)
                                {{-- concatinate the $tname into the id, name, class --}}
                                <div class="row">
                                    <div class="col-6">
                                        {{-- form select dropdown trade_mode name --}}
                                        <div class="form-group">
                                            <label for="trade_mode">Trade Mode</label>
                                            <select required name="trade_mode[]" id="trade_mode" class="form-control">
                                                @foreach ($tradeMode as $item)
                                                    <option value="{{str_replace(' ', '_', $item->name)}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        {{-- form select dropdown trade_mode name --}}
                                        <div class="form-group">
                                            <label
                                            for="recieve_mode"
                                            >Recieve Mode %</label>
                                            {{-- input to get tarde percentage --}}
                                            <input type="text"
                                            required
                                            name="recieve_mode[]"
                                            id="recieve_mode"
                                            class="form-control"
                                            placeholder="0.00"
                                            autocomplete="off"
                                            onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <button type="submit" class="btn btn-primary mt-0 pt-0 custom-button"> Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')


@endsection
