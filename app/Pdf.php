<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpdf\Mpdf;

class Pdf extends Model
{
    static function pdf($accion='ver',$tipo='digital',$orderId)
    {
        $companyOrder = Company::getCompanyWithOrder($orderId);

        $ruc = "10072486893";
        $numero = "00000412";
        $nombres = $companyOrder->name;
        $dia = $companyOrder->updated_at->format('d');
        $mes = $companyOrder->updated_at->format('m');
        $ayo = $companyOrder->updated_at->format('Y');
        $direccion = $companyOrder->address;
        $tlf = $companyOrder->telephone;
        $total = $companyOrder->total;
        $articulos = Orders::getArticles($orderId)->toArray();

        $total = number_format($total,2,'.',' ');

        $data['ruc'] = $ruc;
        $data['numero'] = $numero;
        $data['nombres'] = $nombres;
        $data['dia'] = $dia;
        $data['mes'] = $mes;
        $data['ayo'] = $ayo;
        $data['direccion'] = $direccion;
        $data['tlf'] = $tlf;
        $data['articulos'] = $articulos;
        $data['total'] = $total;
        $data['tipo'] = $tipo;

        if($accion=='html'){
            return view('pdf.generar',$data);
        }else{
            $html = view('pdf.generar',$data)->render();
        }
        $namefile = 'boleta_de_venta_'.time().'.pdf';

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                    'arial' => [
                        'R' => 'arial.ttf',
                        'B' => 'arialbd.ttf',
                    ],
                ],
            'default_font' => 'arial',
            // "format" => "A4",
            "format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
        if($accion=='ver'){
            $mpdf->Output($namefile,"I");
        }elseif($accion=='descargar'){
            $mpdf->Output($namefile,"D");
        }
    }
}
