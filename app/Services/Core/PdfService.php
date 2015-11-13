<?php

namespace JobsArt\Services\Core;


use Barryvdh\DomPDF\PDF;

class PdfService
{
    /**
     * @var PDF
     */
    private $pdf;


    /**
     * @param PDF $pdf
     */
    public function __construct(PDF $pdf)
    {

        $this->pdf = $pdf;
    }

    /**
     * @param $view
     * @param $data
     * @param $name  Name file
     * @return \Illuminate\Http\Response
     */
    public function downloadPdf($view, $data, $name)
    {
        $pdf = $this->pdf->loadView($view, compact('data'));

        return $pdf->download(date('d-m-Y-H:i:s') . '-' . $name . '.pdf');
    }

    /**
     * @param $view
     * @param $data
     * @return \Illuminate\Http\Response
     */
    public function viewPdf($view, $data)
    {
        $pdf = $this->pdf->loadView($view, compact('data'));

        return $pdf->stream();

    }


}