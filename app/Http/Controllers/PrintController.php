<?php

namespace App\Http\Controllers;

require_once "../vendor/autoload.php";
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleDetail;

use FPDF;
use App;
class PrintController extends Controller
{
    public function print($request){
                        

            $venta = Sale::find($request)->get()->first();
            $detalle = SaleDetail::join('products as p', 'p.id', 'sale_details.product_id')
            ->select('sale_details.*', 'p.name as name_product')
            ->where('sale_id', $request)
            ->get();
        $pdf = new FPDF('P','mm',array(80,150)); // Tamaño tickt 80mmx 150 mm (largo aprox)
        // $pdf = new FPDF(); // Tamaño tickt 80mmx 150 mm (largo aprox)
        $ancho = 7;
                // $pdf = new FPDF();
        $pdf->AddPage(); 
        $pdf->SetFont('Arial','B',8);   

        $pdf->setY(5);
        $pdf->setX(20);
        $pdf->Cell(35,$ancho,utf8_decode('Sistema LWPOS'),'B',0,'C');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','',7);   

        $pdf->setX(5);
        //              Encabezado
        $pdf->Cell(10, 7, utf8_decode('Cant'),0,0,'C',0);
        $pdf->Cell(37, 7, utf8_decode('Descripción'),0,0,'C',0);
        $pdf->Cell(10, 7, utf8_decode('Precio'),0,0,'C',0);
        $pdf->Cell(10, 7, utf8_decode('Total'),0,1,'C',0);

        //              DATOS
        $total = 0;
        foreach($detalle as $val){
            $pdf->setX(5);
            $pdf->Cell(10, 5, $val->quantity,0,0,'C',0);
            $pdf->Cell(37, 5, utf8_decode($val->name_product),0,0,'C',0);
            $pdf->Cell(10, 5, '$'.number_format($val->price),0,0,'C',0);
            $pdf->Cell(10, 5, '$'.number_format($val->price*$val->quantity),0,1,'C',0);
            $total += ($val->price*$val->quantity);
        }

        $pdf->Ln(5);
        //              TOTAL
        $pdf->setX(5);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(55,5,'TOTAL',0,0,'L',0);

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(10,5,'$'.number_format($total));
        
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',8);
        $pdf->setX(20);
        $pdf->Cell(55,$ancho+6,utf8_decode('¡GRACIAS POR TU COMPRA!'));

        $pdf->Output();
        // $pdf -> Output('Ticket.pdf', 'I', true);
        exit;
    }           
       
}
