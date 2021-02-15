<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Item;
use App\Models\Sale;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReportController extends Controller
{
    //

    public function index ()
    {
        $sale = Sale::all();
        $section_header = "Report Data Invoice";

        return view('report.report_data',compact(['sale','section_header']));
    }
    public function cetak_invoice($id)
    {
    $invoice = Sale::with(['customer','sale_detail'])->find($id);
    $pdf = PDF::loadView('layouts.cetak_invoice.print2', compact(['invoice']))->setPaper('A4','landscape');
    return $pdf->stream();
    }

    // public function print_qrcode($id)
    // {
    //     $section_header = "QRCODE";
    //     $item = Item::findOrFail($id);
    
        
    //     $qrcode = QrCode::size(200)->format('png')->generate($item->barcode,public_path('assets/img/qrcode.png'));
    //     // dd($qrcode);
    //     $a = PDF::loadView('layouts.cetak_invoice.print',compact(['qrcode','section_header']))->setPaper('A4','potrait');
    //     return $a->stream();

    // }
}
