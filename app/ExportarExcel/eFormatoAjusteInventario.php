<?php

namespace App\ExportarExcel;
use App\Models\mResumenInventario;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
class eFormatoAjusteInventario{
    
    public function __construct()
    {
        $this->resumen = new mResumenInventario();
    }

    public function exportarDatosExcel($IdSede,$IdFamilia,$NombreSede,$NombreFamilia){
        $InventarioProductos =  $this->resumen->obtenerInventarioProductosExcel($IdSede,$IdFamilia);
        
        $file = new Spreadsheet();
        
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'B5B8B1'],
                ],
            ],
        ];

        $active_sheet = $file->getActiveSheet();
        $active_sheet->getPageSetup()->setOrientation( \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $active_sheet->getPageSetup()->setFitToPage(true);
        $active_sheet->setCellValue('B1', 'SEDE: '.$NombreSede)->getStyle('1:1')->getFont()->setBold(true)->setSize(16);
        $active_sheet->setCellValue('C1', 'FAMILIA: '.$NombreFamilia)->getStyle('1:1')->getFont()->setBold(true)->setSize(16);
        $active_sheet->setCellValue('A2', 'ID')->getColumnDimension("A")->setAutoSize(true);
        $active_sheet->setCellValue('B2', 'PRODUCTO')->getColumnDimension("B")->setAutoSize(true);
        $active_sheet->setCellValue('C2', 'UNIDAD_MEDIDA')->getColumnDimension("C")->setAutoSize(true);
        $active_sheet->setCellValue('D2', 'EQUIVALENTE_UNIDAD')->getColumnDimension("D")->setAutoSize(true);
        $active_sheet->setCellValue('E2', 'ULTIMO_STOCK')->getColumnDimension("E")->setAutoSize(true);
        $active_sheet->setCellValue('F2', 'CONTEO_ANTERIOR')->getColumnDimension("F")->setAutoSize(true);
        $active_sheet->setCellValue('G2', 'CONTEO_ACTUAL')->getColumnDimension("G")->setAutoSize(true);
        $active_sheet->setCellValue('H2', 'COSTO_UNITARIO')->getColumnDimension("H")->setAutoSize(true);
        $active_sheet->setCellValue('I2', 'OBSERVACION')->getColumnDimension("I")->setAutoSize(true);

        $active_sheet->getStyle('A2:I2')->applyFromArray($styleArray);

        $count = 3;

        foreach($InventarioProductos->getResult() as $row)
        {
            $active_sheet->setCellValue('A' . $count, $row->IdInventario);
            $active_sheet->setCellValue('B' . $count, $row->NombreProducto);
            $active_sheet->setCellValue('C' . $count, $row->NombreUnidadMedida);
            $active_sheet->setCellValue('D' . $count, $row->EquivalenciaUnidad);
            $active_sheet->setCellValue('E' . $count, $row->Stock);
            $active_sheet->setCellValue('F' . $count, $row->CantidadConteo);
            $active_sheet->setCellValue('G' . $count, '');
            $active_sheet->setCellValue('H' . $count, $row->CostoUnitario);
            $active_sheet->setCellValue('I' . $count, '');

            $active_sheet->getStyle('D'. $count.':H'.$count)->getAlignment()->setHorizontal('center');
            $active_sheet->getStyle('A'. $count.':I'.$count)->applyFromArray($styleArray);

            $count = $count + 1;

        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');
        $file_name = date("Y-m-d").'-ajuste.xlsx' ;
        $writer->save($file_name);
        header('Content-Type: application/x-www-form-urlencoded');
        header('Content-Transfer-Encoding: Binary');
        header("Content-disposition: attachment; filename=\"".$file_name."\"");
        readfile($file_name);
        unlink($file_name);
        return $mensaje='ok';
        /*$writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf($file);
        $writer->setPreCalculateFormulas(false);
        $file_name = date("Y-m-d").'-ajuste.pdf' ;
        $writer->save($file_name);
        header('Content-Type: application/x-www-form-urlencoded');
        header('Content-Transfer-Encoding: Binary');
        header("Content-disposition: attachment; filename=\"".$file_name."\"");
        readfile($file_name);
        unlink($file_name);
        return $mensaje='ok';*/

    }
}