<?php

namespace App\Http\Controllers;

use App\Models\VisitingCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SearchCardController extends Controller
{
    public function index()
    {
        return view('search-card');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        // Search and return the matching names as JSON
        $visitingCards = DB::table('visiting_cards')
            ->where('ownerName', 'LIKE', "%{$query}%")
            ->get(); // Pluck only the names for the suggestion list

        return response()->json($visitingCards);
    }
    public function redirectToPdf($userId)
    {
        // Perform validation to check if the user ID is valid and exists in the database
        $userExists = VisitingCard::where('user_id', $userId)->exists();

        if (!$userExists) {
            // Log the attempt to access a non-existing user's PDF
            \Log::warning("Attempted to access PDF for non-existing user ID: {$userId}");

            // Redirect to a generic error page or back to the previous page with an error message
            return back()->withErrors(['message' => 'User not found.']);
        }

        // Optionally, log the successful redirection to viewing the PDF
        \Log::info("Redirecting to view PDF for user ID: {$userId}");

        // Proceed with the redirection to the route responsible for displaying the PDF
        return redirect()->route('viewpdf', ['id' => $userId]);
    }


}
