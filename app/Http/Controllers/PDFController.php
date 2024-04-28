<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitingCard;
use PDF;

class PDFController extends Controller
{
    // Method to display the PDF in the browser
    public function viewPdf($id)
    {
        // Fetch the visiting card using the provided ID
        $visitingCards = VisitingCard::where('id', $id)->get();
        // Load the view and pass the visiting card data to it
        $pdf = PDF::loadView('pdf', compact('visitingCards'));
        // dd(storage_path());
        // Return the generated PDF to the browser
        // return view('pdf', compact('visitingCards'));
        return $pdf->stream('visitingCard.pdf');
    }



    // Your existing method for downloading PDFs
    public function downloadpdf($id)
    {
        // Retrieve the visiting card by ID
        $visitingCards = VisitingCard::where('id', $id)->get();
        // dd($visitingCards);

        //new code
        // Pass the visiting card data to the PDF view
        $pdf = PDF::loadView('pdf', compact('visitingCards'));

        // Download the PDF file with a specific name
        return $pdf->download('visitingCard-' . $id . '.pdf');

        //new code ends

        // Pass the visiting card data to the PDF view
        // $pdf = PDF::loadView('pdf', compact('visitingCards'));
        // return $pdf->stream();

        // Download the PDF file with a specific name
        //$pdf = PDF::loadView('pdf', compact('visitingCards'));
    }



}
