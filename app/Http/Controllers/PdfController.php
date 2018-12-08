<?php

namespace App\Http\Controllers;

use App\Pdf;
use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function getIndex()
    {
        return view('pdf.index');
    }
    public function getGenerar(Request $request, $orderId)
    {
        $accion = $request->get('accion');
        $tipo = $request->get('tipo');
        Pdf::pdf($accion,$tipo,$orderId);
    }

}
