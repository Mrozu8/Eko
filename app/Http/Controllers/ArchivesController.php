<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Repair;
use App\Sale;
use App\Settings;
use PDF;
use Codedge\Fpdf\Facades\Fpdf;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTechnician', ['except' => 'repair_pdf']);
        $this->middleware('checkWorker', ['except' => 'repair_pdf']);
    }

    public function sale_list()
    {
        $sales = Sale::with('sale_item')->orderBy('id', 'desc')->get();
        return view('archives.sale', compact('sales'));
    }

    public function sale_pdf($id)
    {
        $sale = Sale::with('sale_item')->where('id', $id)->first();
        $settings = Settings::first();

        $pdf = PDF::loadView('pdf.sale', compact('sale', 'settings'));
        return $pdf->download($sale->invoice.'.pdf');
    }

    public function buy_list()
    {
        $buys = Buy::with('buy_item')->orderBy('id', 'desc')->get();
        return view('archives.buy', compact('buys'));
    }

    public function buy_pdf($id)
    {
        $buy = Buy::with('buy_item')->where('id', $id)->first();
        $settings = Settings::first();

        $pdf = PDF::loadView('pdf.buy', compact('buy', 'settings'));
        return $pdf->download($buy->invoice.'.pdf');
    }

    public function repair_list() // TODO:: only ended ?? Add new data about item
    {
        $repairs = Repair::orderBy('id', 'desc')->get();
        return view('archives.repair', compact('repairs'));
    }

    public function repair_pdf($id)
    {
        $repair = Repair::where('id', $id)->first();

        $pdf = PDF::loadView('pdf.repair', compact('repair'));
        return $pdf->download($repair->repair_number.'.pdf');
    }
}
