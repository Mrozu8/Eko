<?php

namespace App\Http\Controllers;

use App\CalendarMaker;
use App\CalendarQuantityOrder;
use App\Repair;
use App\RepairItem;
use App\User;
use App\Warehouse;
use App\WarehouseFlow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        $time = Carbon::now();
        $repair_number = 'NA-'. rand(1000, 9999).'/'.$time->day.'/'.$time->month.'/'.$time->year;
        $repairs = Repair::with('repair_order')->where('status', 1)->get();
        $slots = CalendarQuantityOrder::get()->all();
        return view('repair.new', compact('repair_number', 'slots', 'repairs'));
    }

    public function create(Request $request)
    {
        $worker = Auth::user()->name .' '. Auth::user()->surname;

        Repair::create([
            'repair_number' => $request->repair_number,
            'worker' => $worker,
            'customer' => $request->customer,
            'address' => $request->address,
            'nip' => $request->nip,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'customer_note' => $request->customer_note,
            'warranty' => $request->warranty,
            'model' => $request->model,
            'code_first' => $request->code_first,
            'code_second' => $request->code_second,
            'serial_number' => $request->serial_number,
            'supplier' => $request->supplier,
            'sale_date' => $request->sale_date,
            'repair_date' => $request->repair_date,
            'other_note' => $request->other_note,
            'damage_note' => $request->damage_note,
        ]);

        return back();
    }

    public function current()
    {
        $repairs = Repair::where('status', 1)->orderBy('id', 'desc')->get();
        return view('repair.current', compact('repairs'));
    }

    public function single($id)
    {
        $repair = Repair::with('repair_order.repair_worker', 'items_repair')->where('id', $id)->first();
        $users = User::where('role', 4)->get();
//        dd($repair);

        return view('repair.single', compact('repair','users'));
    }

    public function ended()
    {
        $repairs = Repair::where('status', 2)->orderBy('id', 'desc')->get();
        return view('repair.ended', compact('repairs'));
    }

    public function end(Request $request, $id)
    {
        $repair = Repair::findOrFail($id);
        $repair->cost = $request->cost;
        $repair->delivery_cost = $request->delivery_cost;
        $repair->success = $request->success;
        $repair->success = $request->success;
        $repair->total_cost = $request->total_cost;
        $repair->note_end = $request->note_end;
        $repair->status = 2;

        $repair->save();

        $worker = Auth::user()->name .' '. Auth::user()->surname;


        for ($i = 0; $i <= (sizeof($request->code)-1); $i++)
        {
            RepairItem::create([
                'repair_id' => $id,
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
               'status' => 'Naprawa',
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

    public function add_worker(Request $request, $id)
    {
        $this->validate($request, [
            'worker' => 'required',
        ], [
            'required' => 'Ro pole jest wymagane'
        ]);

        $exist = CalendarMaker::where('repair_id', $id)->first();

        if ($exist != null)
        {
            return redirect()->back()->with('error', 'To zlecenie jest już przydzielone.');
        }

        CalendarMaker::create([
            'repair_id' => $id,
            'worker_id' => $request->worker,
        ]);

        return back();
    }

    public function date_check(Request $request)
    {
        $exist = CalendarQuantityOrder::where('date', $request->date)->first();
        $today = Carbon::today()->format('Y-m-d');

        if ($exist == null)
        {
            return response()->json(['success'=> 'W tym dniu nie została przydzielona jeszcze ilość możliwych napraw. Należy ją ustalić w kalendarzu.']);
        }
        elseif ($request->date < $today)
        {
            return response()->json(['success'=> 'Podana data naprawy, '. $request->date. ' jest nieprawidłowa.']);
        }
        else
        {
            $qty = Repair::where('repair_date', $request->date)->count();

            if ($qty == $exist->quantity)
            {
                return response()->json(['success'=> 'W tym dniu liczba możliwych napraw została wykorzystana. Sprawdź kalendarz i zapisz naprawę na inny dzień.']);
            }
        }

        return response()->json(['success'=> 1]);
    }
}

