<?php

namespace App\Http\Controllers;

use App\Models\VisitingCard; // Make sure to import your VisitingCard model
use Illuminate\Support\Str; // Import Str for string operations
use Illuminate\Http\Request;

class SearchResultController extends Controller
{
    public function index(Request $request, $id)
    {
        // Fetch the visiting card using the provided ID
        $visitingCard = VisitingCard::where('id', $id)->first(); // Use first() to get a single model instance
        // dd($visitingCard);
        // if ($visitingCard && Str::startsWith($visitingCard->qr_code, 'D:\\')) {
        //     // Convert the absolute path to a relative path
        //     $relativePath = Str::replaceFirst('D:\\ITooso\\xampp\\htdocs\\itooso_visiting_card\\public\\', '', $visitingCard->qr_code);
        //     $visitingCard->qr_code = asset($relativePath); // Use the asset helper to get the correct URL
        // }
        // if ($visitingCard && Str::startsWith($visitingCard->qr_code, base_path('public'))) {
        //     // Convert the absolute path to a relative path
        //     $relativePath = Str::replaceFirst(base_path('public'), '', $visitingCard->qr_code);
        //     $visitingCard->qr_code = asset($relativePath); // Use the asset helper to get the correct URL
        // }

        // Check if the visiting card exists before trying to pass it to a view
        if (!$visitingCard) {
            abort(404); // Or return a custom error view if the visiting card is not found
        }
        // dd($visitingCard);
        // Return the view and pass the visiting card data
        return view('search-result', compact('visitingCard')); // Assuming your view's filename is downloadpdf.blade.php
    }
}
