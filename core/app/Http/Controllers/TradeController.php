<?php

namespace App\Http\Controllers;

use App\Currency;
use App\GeneralSettings;
use App\Post;
use App\Instrument;
use App\TradeMode;
use App\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    // crud methods
    public function index()
    {
        $data['page_title'] = "Home";
        $data['currency'] = Currency::whereStatus(1)->orderBy('symbol','asc')->get();

        $data['instruments'] = Instrument::all();
        $data['tradeMode'] = TradeMode::where('status','active')->get();
        return view('user.new-trade', $data);
    }

    public function create(){
        $data['page_title'] = "Create New Trade";
        $data['currency'] = Currency::whereStatus(1)->orderBy('symbol','asc')->get();
        $data['instruments'] = Instrument::all();
        $data['tradeMode'] = TradeMode::where('status','active')->get();
        return view('user.seller.new-trade', $data);
    }

    public function store(Request $request){

        // trade object has seller_id, instrument_id, currency_id, amount, selling_date, expected_date, seller_trade_mode, buyer_trade_mode, status
        $trade = new Trade();
        // trade seller id is auth user id
        $trade->seller_id = auth()->user()->id;
        $trade->instrument_id = $request->instrument;
        $trade->currency_id = $request->currency;
        $trade->amount = $request->amount;
        $trade->selling_date = $request->selling_date;
        $trade->expected_date = $request->expected_date;
        $trade_modes = array();
        foreach ($request->trade_mode as $key => $value) {
            $trade_modes[$value] =$request->recieve_mode[$key];

        }

        // seller_trade_mode is json_encode of tarde_modes
        $trade->seller_trade_modes = json_encode($trade_modes);
        $trade->status = $request->status;

        // if save success, return with success or error
        if($trade->save()){
            return redirect()->route('home')->with('success', 'Trade Created Successfully');
        }
        return redirect()->route('home')->with('error', 'Trade Created Failed');

    }

    // method for myTrades where if the user->type is seller, then trades with his id or if the user type is buyer then all sellers trades so he can bid
    public function myTrades(){
        $data['page_title'] = "My Trades";
        if(auth()->user()->type == 'seller'){
            $data['trades'] = Trade::where('seller_id', auth()->user()->id)->get();
        }else{

            // if the user is buyer then go back with error you cant access
            return redirect()->back()->with('error', 'You cant access this page');
        }
        return view('user.my-trades', $data);

    }

    // method to show Trade details to seller
    public function show($id){
        $data['page_title'] = "Trade Order Details";
        $data['trade'] = Trade::find($id);
        return view('user.seller.trade-details', $data);
    }


}
