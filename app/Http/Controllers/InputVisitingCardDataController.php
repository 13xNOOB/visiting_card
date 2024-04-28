<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\VisitingCard;
use Illuminate\Support\Facades\Log;

class InputVisitingCardDataController extends Controller
{
    // VisitingCardController.php
    public function index()
    {
        return view('input-visiting-card-data');
    }

    public function validatedata(Request $request)
    {
        $validatedData = $request ->validate(
            [
                'companyLogo' => 'required|image|mimes:png|max:2048', // Ensure it's an image and PNG format
                'ownerName' => 'required',
                'ownerDesignation' => 'required',
                'ownerContactNumber' => 'required|numeric',
                'location' => 'required',
                'email' => 'required|email',
                'social' => 'required'

            ]
        );



        //saving the image to disc
        $fileName = time()."_".$request->file('companyLogo')->getClientOriginalName();//creates name
        $filePath = $request->file('companyLogo')->storeAs('uploads', $fileName, 'public');//shows location of saved file
        //dd($filePath);
        // echo "<pre>";
        // print_r($request->all());



        // To handle foreign key
        $user = Auth::user(); // Get the currently authenticated user
        // Creating or updating the VisitingCard model instance
        $visitingCard = new VisitingCard();
        $visitingCard->user_id = $user->id; // Associate with a user
        $visitingCard->companyLogo = $filePath; // Store the file path in the database
        $visitingCard->ownerName = $request->ownerName;
        $visitingCard->ownerDesignation = $request->ownerDesignation;
        $visitingCard->ownerContactNumber = $request->ownerContactNumber;
        $visitingCard->location = $request->location;
        $visitingCard->email = $request->email;
        $visitingCard->social = $request->social;


        //QR CODE
        // Concatenate the visiting card details to create the QR code content
        $qrContent = "Name: {$visitingCard->ownerName}\n";
        $qrContent .= "Designation: {$visitingCard->ownerDesignation}\n";
        $qrContent .= "Contact: {$visitingCard->ownerContactNumber}\n";
        $qrContent .= "Location: {$visitingCard->location}\n";
        $qrContent .= "Email: {$visitingCard->email}\n";
        $qrContent .= "Social: {$visitingCard->social}";


        // dd(storage_path());

        $qrFileName = 'qr_code_' . time() .'.svg';
        $relativePath = 'qrcodes/' . $qrFileName;

        // dd($qrStoragePath);
        QrCode::format('svg')->size(200)->generate($qrContent, public_path($relativePath));
        // Store the path in a way similar to the company logo
        // $qrStoragePath = public_path('qrcodes/' . $qrFileName);
        // $visitingCard->qr_code = $qrStoragePath;
        $visitingCard->qr_code = $relativePath;
        // dd($visitingCard);

        $visitingCard->save();
        return redirect('/visitingcard_view');
    }


}
