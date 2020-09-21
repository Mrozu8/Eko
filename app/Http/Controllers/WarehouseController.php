<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTechnician');
        $this->middleware('checkWorker');
    }

    public function list(Request $request)
    {
        $warehouse = $request->warehouse;
        $search = $request->search;
        $supplier = $request->supplier;

        if($search || $warehouse || $supplier){

            $items = Warehouse::selectRaw('code,
             name AS name,
             service_code AS service_code,
             supplier AS supplier,
             SUM(quantity) AS quantity')->when($warehouse, function ($query) use ($warehouse) {
                return $query->where([
                    ['warehouse', $warehouse],
                ]);
            })
                ->when($supplier, function ($query) use ($supplier) {
                    return $query->where([
                        ['supplier', $supplier],
                    ]);
                })

                ->when($search, function ($query) use ($search) {
                return $query->where('service_code', 'like', '%'. $search .'%')
                    ->orWhere('name', 'like', '%'. $search .'%')
                    ->orWhere('supplier', 'like', '%'. $search .'%');
            })
                ->get();

            if ($items[0]['code'] == null)
            {
                $items = [];
            }

            return view('warehouse.list', compact('items'));
        }
        else{
            // Change STRICT_MODE in config/database to false

            $items = Warehouse::selectRaw('code,
             name AS name,
             service_code AS service_code,
             supplier AS supplier,
             SUM(quantity) AS quantity')->where('warehouse', Auth::user()->workplace)->groupBy('code')->get();

            return view('warehouse.list', compact('items'));
        }
    }

    public function single($code)
    {
        $items = Warehouse::with('warehouse_item', 'book_warehouse.book_user')->where('code', $code)->get();
        return view('warehouse.preview', compact('items'));
    }

    public function transfer(Request $request, $id)
    {
        //TODO:: validate only unsigned no float number

        $this->validate($request,[
            'quantity_transfer' => 'required'
        ]);
        $item = Warehouse::where('id', $id)->first();

        $transfer = Warehouse::where([
            ['code', $item->code],
            ['buy_id', $item->buy_id],
            ['warehouse', $request->warehouse]
        ])->first();

        if ($item->quantity < $request->quantity_transfer)
        {
            return back(); // TODO:: notify - item quantity not available
        }
        elseif ($item->quantity == $request->quantity_transfer && $transfer == null)
        {
            $item->warehouse = $request->warehouse;
        }
        else
        {
            if ($transfer != null)
            {
                $transfer->quantity += $request->quantity_transfer;
                $transfer->save();
            }
            else
            {
                $new_item = $item->replicate();
                $new_item->quantity = $request->quantity_transfer;
                $new_item->warehouse = $request->warehouse;
                $new_item->save();
            }

            $item->quantity -= $request->quantity_transfer;
        }

        $item->save();

        return back(); // TODO:: notify
    }

    public function delete(Request $request, $id)
    {
        //TODO:: validate only unsigned no float number
        $item = Warehouse::where('id', $id)->first();

        if ($item->quantity >= $request->quantity_drop)
        {
            $item->quantity -= $request->quantity_drop;
            $item->save();
            return back(); // TODO:: notifi to delete product and soft delete style in warehouse
        }
        else
        {
            return back();
        }
    }

    public function book(Request $request, $id)
    {
        $request->validate([
            'quantity_book' => 'integer'
        ]);
        Book::create([
            'user_id' => Auth::id(),
            'warehouse_id' => $id,
            'quantity' => $request->quantity_book,
        ]);

        return back();
    }

    public function book_delete($id)
    {
        Book::findOrFail($id)->delete();
        return back();
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('warehouses')
                ->where('code', 'like', '%'.$query.'%')
                ->orWhere('service_code', 'like', '%'.$query.'%')
                ->orWhere('supplier', 'like', '%'.$query.'%')
                ->orderBy($sort_by, $sort_type)
                ->paginate(5);
            dd($data);
            return view('warehouse.tb', compact('data'))->render();
//            return response()->json(['items'=> $data]);
        }

    }
}
