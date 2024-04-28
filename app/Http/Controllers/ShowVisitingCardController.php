<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitingCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShowVisitingCardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $visitingCards = $user->visitingCards; // Retrieve all visiting cards for the user
        // Transform the QR code paths
        //$visitingCards->transform(function ($visitingCard) {
        // Assuming the QR code path is stored in a 'qr_code' attribute on the visiting card
        // if (Str::startsWith($visitingCard->qr_code, 'D:\\')) {
        //     // Convert the absolute path to a relative path
        //     $relativePath = Str::replaceFirst('D:\\ITooso\\xampp\\htdocs\\itooso_visiting_card\\public\\', '', $visitingCard->qr_code);
        //     $visitingCard->qr_code = asset($relativePath); // Use the asset helper to get the correct URL
        // }
        //return $visitingCard;
        //});
        //return $visitingCards;
        // dd($user->companyLogo);

        return view('show-visiting-card', compact('visitingCards'));
    }
}
