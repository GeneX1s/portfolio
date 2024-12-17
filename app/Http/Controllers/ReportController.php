<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function generatorReport(Request $request){

        return view('dashboard.report.generator', [
          ]);

    }


}