<?php

namespace App\Http\Controllers;

use App\Buy;
use App\BuyItems;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTechnician');
    }

    public function new()
    {
        return view('buy.new');
    }

    public function store(Request $request)
    {
        $worker = Auth::user()->name .' '. Auth::user()->surname;

        $buy = Buy::create([
            'invoice' => $request->invoice,
            'worker' => $worker,
            'dealer_name' => $request->dealer_name,
            'address' => $request->address,
            'nip' => $request->nip,
            'note' => $request->note,
            'cost' => $request->total_price,
        ]);

        for ($i = 0; $i <= (sizeof($request->code)-1); $i++)
        {
            $supplier = substr($request->supplier[$i], 0, 2);
            $service_code = strtoupper($supplier.$request->code[$i]);

            //TODO:: invoice db record create

            foreach($request->warehouse as $key => $val)
            {
                if($val[$i] != null)
                {
                    Warehouse::create([
                        'buy_id' => $buy->id,
                        'code' => $request->code[$i],
                        'service_code' => $service_code,
                        'name' => $request->name[$i],
                        'supplier' => $request->supplier[$i],
                        'quantity' => $val[$i],
                        'unit_price' => $request->unit_price[$i],
                        'warehouse' => $key,
                    ]);
                }
            }

            BuyItems::create([
                'buy_id' => $buy->id,
                'code' => $request->code[$i],
                'service_code' => $service_code,
                'name' => $request->name[$i],
                'supplier' => $request->supplier[$i],
                'quantity' => $request->quantity[$i],
                'unit_price' => $request->unit_price[$i],
            ]);
        }

        return back();
    }
}
