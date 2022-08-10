@extends('user')
@section('content')
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

    @if (auth()->user()->type == 'seller')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Trades</h5>
                      <span class="h2 font-weight-bold mb-0">{{count($trades)}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape">
                        <i class="fa fa-bars text-primary" aria-hidden="true"></i>
                        {{-- <i class="fa fa-bar-chart text-primary" aria-hidden="true"></i> --}}
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    @php
                        // if total_trades_this_month is 0 then show 0 else show total_trades_this_month
                        if($total_trades_this_month == 0) {
                            $TT_perc = 0;
                        } else {
                            $TT_perc = $total_trades_last_month / $total_trades_this_month * 100;
                        }
                        // $TT_perc = $total_trades_last_month / $total_trades_this_month * 100;
                    @endphp
                    @if ($TT_perc > 100)
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$TT_perc}}%</span>
                    @else
                        <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> {{$TT_perc}}%</span>
                    @endif
                    {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> --}}
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            {{-- another card with Total Closed Trades --}}
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Trades Closed</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_closed_trades}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape ">
                        <i class="fa fa-percent text-success" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    @php
                        if($total_trades_last_month_closed == 0) {
                            $TC_perc = 0;
                        } else {
                            $TC_perc = $total_trades_last_month_closed / $total_trades_this_month_closed * 100;
                        }
                        // $TC_perc = $total_trades_last_month_closed / $total_trades_this_month_closed * 100;
                    @endphp
                    @if ($TC_perc > 100)
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$TC_perc}}%</span>
                    @else
                        <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> {{$TC_perc}}%</span>
                    @endif
                    {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 12.18%</span> --}}
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Bids</h5>
                      <span class="h2 font-weight-bold mb-0">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape">
                        <i class="fas fa-chart-pie text-info"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 0%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            {{-- <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
    </div>
        <div class="container">
            <div class="row">

                {{-- my tarde order table --}}
                <div class="col-md-12 mt-5 tables">
                    <div class="title">
                        <h3 class="pb-3">My Trade Orders</h4>
                    </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead class="bg-primary text-white shadow-sm">
                                    <tr>
                                        <th scope="col font-weight-bold">ID</th>
                                        <th scope="col font-weight-bold">Instrument</th>
                                        <th scope="col font-weight-bold">Currency</th>
                                        <th scope="col font-weight-bold">Amount</th>
                                        <th scope="col font-weight-bold">Status</th>
                                        <th scope="col font-weight-bold">Time</th>
                                        {{-- <th scope="col font-weight-bold">Exchange Percentage</th> --}}
                                        <th>Buyer Bids</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($trades) > 0)
                                        @foreach($trades as $k=>$data)
                                            <tr>
                                                <th scope="row">{{$k+1}}</th>
                                                <td scope="row">{{$data->instrument->name}}</td>
                                                <td scope="row">{{$data->currency->name}}</td>
                                                <td scope="row" class="text-primary">{{$data->amount}}</td>
                                                <td scope="row">
                                                    {{-- if in progress then primary color or danger color --}}
                                                    @if($data->status == 'private')
                                                        <span class="badge badge-warning">{{$data->status}}</span>
                                                    @elseif($data->status == 'closed')
                                                        <span class="badge badge-success">{{$data->status}}</span>
                                                    @elseif($data->status == 'open')
                                                        <span class="badge badge-primary">{{$data->status}}</span>
                                                    @endif
                                                </td>
                                                <td scope="row">
                                                    <span class="badge badge-light">{{$data->created_at->diffForHumans()}}</span>
                                                </td>
                                                {{-- <td>
                                                    @php
                                                        // json decode the trademodes and get array for forloop
                                                        $trade_modes = json_decode($data->seller_trade_modes);
                                                        foreach ($trade_modes as $key => $value) {
                                                            echo $key . ' - ' . $value . '%<br>';
                                                        }
                                                    @endphp
                                                </td> --}}
                                                <td>
                                                    <span class="badge badge-success"> <i class="fa fa-eye" aria-hidden="true"></i> 20</span>
                                                </td>
                                                <td>
                                                    <a href="{{route('trade.show', $data->id)}}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6"> No Data Found !!</td>
                                        </tr>
                                    @endif
                                    </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endif

@endsection
@section('js')

@endsection
