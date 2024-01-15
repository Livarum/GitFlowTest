<?php

// app/Http/Controllers/GeneratePdfController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfController extends Controller
{
    public function testPdf()
    {
        $data = ['key' => 'value'];

        // Update the view path to reflect the correct directory
        $pdf = PDF::loadView('pdf.pdf_view', $data);

        return $pdf->download('document.pdf');
    }
}