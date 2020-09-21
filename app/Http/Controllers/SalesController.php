<?php

namespace App\Http\Controllers;

use App\Buy;
use App\BuyItems;
use App\Sale;
use App\SaleItem;
use App\Warehouse;
use App\WarehouseFlow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTechnician');
    }

    public function new_sale()
    {
        $time = Carbon::now();
        $invoice = 'FV-'. rand(1000, 9999).'/'.$time->day.'/'.$time->month.'/'.$time->year;
        return view('sale.new-item', compact('invoice'));

    }

    public function sale_store(Request $request)
    {
        $worker = Auth::user()->name .' '. Auth::user()->surname;

        $sale = Sale::create([
            'invoice' => $request->invoice,
            'worker' => $worker,
            'buyer_name' => $request->buyer_name,
            'address' => $request->address,
            'nip' => $request->nip,
            'note' => $request->note,
            'cost' => $request->total_cost,
        ]);

        for ($i = 0; $i <= (sizeof($request->code)-1); $i++)
        {
            SaleItem::create([
                'sale_id' => $sale->id,
                'code' => $request->code[$i],
                'name' => $request->name[$i],
                'quantity' => $request->quantity[$i],
                'unit_price' => $request->unit_price[$i],
            ]);

            $item = Warehouse::where([
                ['code', $request->code[$i]],
                ['warehouse', Auth::user()->workplace],
            ])->first();

            WarehouseFlow::create([
                'worker' => $worker,
                'status' => 'Sprzedaż',
                'buy_id' => $item->buy_id,
                'code' => $item->code,
                'service_code' => $item->service_code,
                'name' => $item->name,
                'supplier' => $item->supplier,
                'quantity' => $request->quantity[$i],
                'unit_price' => $item->unit_price,
                'warehouse' => Auth::user()->workplace,
            ]);

            $item->quantity -= $request->quantity[$i];

            if($item->quantity == 0)
            {
                $item->delete();
            }
            else
            {
                $item->save();
            }
        }

        return back();
    }

    public function item_exists(Request $request)
    {
        $error = [];
        $sum = [];

        foreach ($request->code as $key => $val)
        {
            if (isset($sum[$val]))
            {
                $sum[$val] += $request->quantity[$key];
            }
            else
            {
                $sum[$val] = $request->quantity[$key];
            }
        }

        foreach ($request->code as $key => $val)
        {
            $item = Warehouse::where([
                ['code', $val],
                ['warehouse', Auth::user()->workplace],
            ])->sum('quantity');


            if ($item < $request->quantity[$key] || $item < $sum[$val])
            {
                $error[$key] = $val;
            }
        }
        return response()->json(['success'=> $error]);
    }
}
