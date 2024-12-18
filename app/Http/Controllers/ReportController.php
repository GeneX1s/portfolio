<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Dompdf\Options;

class ReportController extends Controller
{
    public function generateReport()
    {
        // Data to pass to the view (could be from a database)
        // $data = [
        //     'title' => 'Monthly Report',
        //     'date' => now()->toDateString(),
        //     'items' => [
        //         ['name' => 'Item 1', 'price' => 20],
        //         ['name' => 'Item 2', 'price' => 35],
        //         ['name' => 'Item 3', 'price' => 50],
        //     ]
        // ];


        // Load the view with data and convert it to PDF
        // $pdf = PDF::loadView('reports.monthly', $data);

        // Download the generated PDF
        // return $pdf->download('monthly_report.pdf');
    }



    public function generateActivePagePDF(Request $request)
    {
        // Optionally, you can pass data to the view or capture the current URL
        $pageContent = view('dashboard.index')->render(); // Capture HTML of the current page

        // Use the DOMPDF package to load and generate PDF
        $pdf = PDF::loadHTML($pageContent); // Pass HTML content directly

        // Download the generated PDF
        return $pdf->download('pdfReport.pdf');
    }

    public function generatePDF(Request $request)
{
    // Retrieve any dynamic data that will go into the PDF
    $dynamicData = $this->getDynamicData(); // Example: data from a database or model

    // Pass the dynamic data to the view
    $view = view('pdf_template', compact('dynamicData'))->render();

    // Configure domPDF options (optional)
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);  // For better HTML5 support
    $options->set('isPhpEnabled', true);          // Enable PHP functions if needed

    // Initialize domPDF
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($view);

    // Set paper size (optional)
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF (first pass)
    $dompdf->render();

    // Output the PDF (force download or save to file)
    return $dompdf->stream('output.pdf');
}


    public function generatorReport(Request $request){

        return view('dashboard.report.generator', [
          ]);

    }


}