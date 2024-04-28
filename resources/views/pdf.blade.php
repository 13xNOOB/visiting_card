<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting Card Layout</title>
</head>

<body>
    <div class="container">
        @foreach ($visitingCards as $visitingCard)
        <!-- Start of Table -->
        <table class="table table-bordered">
            <!-- Start of First Main Row -->
            <tr>
                <!-- Start of Company Logo and QR Code Cell (R1C1 and R2C1) -->
                <td style="width: 50%; vertical-align: top;">
                    <!-- Start of Nested Table for Logo and QR Code -->
                    <table>
                        <!-- Start of Nested Row for Company Logo -->
                        <tr>
                            <td style="border: none; text-align: center;">
                                <?php
                                    $logo = str_replace("uploads", "storage/app/public/uploads", $visitingCard->companyLogo);
                                ?>
                                <!-- Company Logo Here -->
                                <img src="{{base_path($logo)}}" alt="Company Logo" style="width: 100px; height: 100px;">
                                <!-- {{base_path($logo)}} -->
                                <!-- {{base_path($logo)}} -->
                                <!-- {{base_path('public/storage/uploads/logos/1711280448.visiting card template.png')}} -->
                            </td>
                        </tr>
                        <!-- End of Nested Row for Company Logo -->

                        <!-- Start of Nested Row for QR Code -->
                        <tr>
                            <td style="border: none; text-align: center;">
                                <!-- QR Code Here -->
                                <img src="{{ $visitingCard->qr_code }}" alt="QR Code" style="height: 75px;">
                            </td>
                        </tr>
                        <!-- End of Nested Row for QR Code -->
                    </table>
                    <!-- End of Nested Table for Logo and QR Code -->
                </td>
                <!-- End of Company Logo and QR Code Cell (R1C1 and R2C1) -->
                <!-- Start of Owner Info Cell R1C2 -->
                <td style="width: 50%; text-align:left ; ">
                    <!-- Owner Information Here -->
                    <div>
                        <img src="{{public_path('icons/user.png')}}" style="width:20px;margin-top:5px;">
                        <strong>{{ $visitingCard->ownerName }}</strong>
                    </div>
                    <div>
                        <img src="{{public_path('icons/briefcase.png')}}" style="width:20px;margin-top:5px;">
                        <strong>{{ $visitingCard->ownerDesignation }}</strong>
                    </div>
                    <div>
                        <img src="{{public_path('icons/phone.png')}}" style="width:20px;margin-top:5px;">
                        <strong>{{ $visitingCard->ownerContactNumber }}</strong>
                    </div>
                    <div>
                        <img src="{{public_path('icons/location.png')}}" style="width:20px;margin-top:5px;">
                        <strong>{{ $visitingCard->location }}</strong>
                    </div>
                    <div><img src="{{public_path('icons/email.png')}}" style="width:20px;margin-top:5px;">
                        <strong>{{ $visitingCard->email }}</strong>
                    </div>
                    <div>
                        <img src="{{public_path('icons/social.png')}}" style="width:20px;margin-top:5px;">
                        <strong>{{ $visitingCard->social }}</strong>
                    </div>
                </td>
                <!-- End of Owner Info Cell R1C2 -->
            </tr>
            <!-- End of First Row -->

        </table>
        <!-- End of Table -->
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>