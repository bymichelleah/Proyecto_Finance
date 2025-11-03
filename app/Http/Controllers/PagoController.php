<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use PDF;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.pagos', compact('pagos'));
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    public function descargarPDF($id)
    {
        $pago = Pago::findOrFail($id);
        $pdf = \PDF::loadView('pagos.pdf', compact('pago'));
        return $pdf->download('detalle_pago_' . $pago->id . '.pdf');
    }
}
