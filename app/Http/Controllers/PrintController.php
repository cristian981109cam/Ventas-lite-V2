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
                        

            $venta = Sale::where('id',$request)->get()->first();
            $detalle = SaleDetail::join('products as p', 'p.id', 'sale_details.product_id')
            ->select('sale_details.*', 'p.name as name_product')
            ->where('sale_id', $request)
            ->get();
        $pdf = new FPDF('P','mm',array(80,150)); // Tamaño tickt 80mmx 150 mm (largo aprox)
        // $pdf = new FPDF(); // Tamaño tickt 80mmx 150 mm (largo aprox)
        $ancho = 7;
                // $pdf = new FPDF();
        $pdf->AddPage(); 
        
        $pdf->setY(5);
        $pdf->setX(40);
        $pdf->SetFont('Arial','B',8);   
        $pdf->Image('assets/img/Multiservicios-EMSUB.jpeg' , 22,8,40);
        $pdf->Ln(20);

        $pdf->setY(20);
        $pdf->setX(25);
        $pdf->Cell(35,$ancho,utf8_decode('MULTISERVICIOS EMSUB'),0,0,'C');

        $pdf->setY(23);
        $pdf->setX(25);
        $pdf->Cell(35,$ancho,utf8_decode('IBAGUE, TOLIMA'),0,0,'C');

        $pdf->setY(26);
        $pdf->setX(25);
        $pdf->Cell(35,$ancho,utf8_decode('NIT: *********'),0,0,'C');

        $pdf->setY(29);
        $pdf->setX(25);
        $pdf->Cell(35,$ancho,utf8_decode('TELEFONO: 3*********'),0,0,'C');


        $pdf->Ln(10);

        $pdf->setY(32);
        $pdf->setX(7);
        $pdf->Cell(20,$ancho,utf8_decode('FOLIO: #'). $request,0,0,'C');
        $pdf->setY(35);
        $pdf->setX(15);
        $pdf->Cell(20,$ancho,utf8_decode('FECHA: ').date('d-m-Y H:i'),0,0,'C');

        $pdf->setY(38);
        $pdf->setX(18);
        $pdf->Cell(20,$ancho,utf8_decode('ATIENDE: ').auth()->user()->name,'B',0,'C');

        $pdf->setY(45);
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
        $pdf->Cell(8,5,'$'.number_format($venta->total));
        
        $pdf->Ln(4); 

        $pdf->setX(5);
        $pdf->Cell(55,5,'EFECTIVO',0,0,'L',0);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(10,5,'$'.number_format($venta->cash));

        $pdf->Ln(4);
        $pdf->setX(5);
        $pdf->Cell(55,5,'CAMBIO',0,0,'L',0);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(10,5,'$'.number_format($venta->change));
        
        $pdf->Ln(10);

        $pdf->setX(5);
        $pdf->SetFont('Arial','B',8);
        $pdf->setX(20);
        $pdf->Cell(55,$ancho+6,utf8_decode('¡GRACIAS POR TU COMPRA!'));
        
        $pdf->Ln(3);

        $pdf->setX(5);
        $pdf->SetFont('Arial','B',8);
        $pdf->setX(22);
        $pdf->Cell(55,$ancho+6,utf8_decode('MULTISERVICIOS EMSUB'));

        $pdf->Output();
        // $pdf -> Output('Ticket.pdf', 'I', true);
        exit;
    }           
       
}
