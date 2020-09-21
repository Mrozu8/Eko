<?php

namespace App\Http\Controllers;

use App\CalendarMaker;
use App\CalendarQuantityOrder;
use App\Repair;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTechnician');
        $this->middleware('checkWorker');
    }

    public function index()
    {
        $repairs = Repair::with('repair_order')->where('status', 1)->get();
        $slots = CalendarQuantityOrder::get()->all();
        return view('calendar.index', compact( 'repairs', 'slots'));
    }

    public function add_slot(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'slot' => 'required|integer',
        ],[
            'required' => 'To pole jest wymagane',
            'integer' => 'Podaj liczbę',
        ]);

        $exist = CalendarQuantityOrder::where('date', $request->date)->first();
        $today = Carbon::today()->format('Y-m-d');

        if ($today > $request->date)
        {
            return redirect()->back()->with('error-add', 'Podana data jest błędna. Nie możesz ustalić liczby możliwych napraw dla dni z przeszłości.');
        }
        elseif ($exist != null)
        {
            return redirect()->back()->with('error-add', 'W tym dniu istnieje już ustalona liczba możliwych napraw');
        }

        CalendarQuantityOrder::create([
            'date' => $request->date,
            'quantity' => $request->slot,
        ]);

        return back();
    }

    public function edit_slot(Request $request)
    {
        $this->validate($request, [
            'date_edit' => 'required',
            'slot_edit' => 'required|integer',
        ],[
            'required' => 'To pole jest wymagane',
            'integer' => 'Podaj liczbę',
        ]);

        $exist = CalendarQuantityOrder::where('date', $request->date_edit)->first();
        $repairs = Repair::where('repair_date', $request->date_edit)->count();


        $today = Carbon::today()->format('Y-m-d');

        if ($today > $request->date_edit)
        {
            return redirect()->back()->with('error-edit', 'Podana data jest błędna. Nie możesz ustalić liczby możliwych napraw dla dni z przeszłości.');
        }
        elseif ($exist == null)
        {
            return redirect()->back()->with('error-edit', 'W tym dniu nie została jeszcze ustalona liczba możliwych napraw.');
        }
        elseif ($repairs > $request->slot_edit)
        {
            return redirect()->back()->with('error-edit', 'W tym dniu zostało już zaplanowane '.$repairs.' napraw. Nie możesz zmienić ilości mozliwych napraw poniżej tej liczby.' );
        }

        CalendarQuantityOrder::where('date', $request->date_edit)->update(['quantity' => $request->slot_edit]);

        return back();
    }
}
