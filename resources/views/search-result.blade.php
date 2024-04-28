<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .box {
            border: solid 1px #000;
            margin-bottom: 20px;
            text-align: center;
            padding: 20px;
        }
        .row > div {
            padding-bottom: 20px;
        }
        .user-data-field {
            text-align: left;
            margin-bottom: 10px; 
        }
    </style>
</head>
<body>
    <div>
        <br>
        <div style="display: flex; justify-content: center; align-items: center;">
            <h1 style="margin-right: 20px;">Search Card Result</h1>
            
            <form action="{{URL::to('/dashboard')}}" method="get" style="margin-bottom: 0;">
                <button class="btn btn-success">Dashboard</button>                        
            </form>
        </div>
        <br>
    </div>
    <div class="box" style="width:40%;margin: 0 auto;">
                    <div class="row">
                        <div class="col-md-6" style="text-align:left;">
                            
                            <img src="{{ Storage::url($visitingCard->companyLogo) }}" alt="Company Logo" style="max-height: 125px;">
                            <br><br>
                            <img src="{{ asset($visitingCard->qr_code) }}" alt="QR Code" style="height: 75px;">                            
                        </div>
                        <div class="col-md-6">
                            <div style="border: none;">
                                <!-- R1C2: User Data -->
                                <div style="text-align: center; border: none; padding: 0; font-size: 28px; font-family: 'Poppins', sans-serif; font-weight: 500;"> 
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <strong>{{ $visitingCard->ownerName }}</strong>
                                </div>
                                <div style="text-align: center; border: none; padding: 0; font-size: 20px; font-family: 'Poppins', sans-serif;" class="user-data-field">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    <strong>{{ $visitingCard->ownerDesignation }}</strong>
                                </div>
                                <div style="text-align: center; border: none; padding: 0; font-size: 20px; font-family: 'Poppins', sans-serif;" class="user-data-field">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <strong>{{ $visitingCard->ownerContactNumber }}</strong>
                                </div>
                                <div style="text-align: center; border: none; padding: 0; font-size: 20px; font-family: 'Poppins', sans-serif;" class="user-data-field">
                                    <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                    <strong>{{ $visitingCard->location }}</strong>
                                </div>
                                <div style="text-align: center; border: none; padding: 0; font-size: 20px; font-family: 'Poppins', sans-serif;" class="user-data-field">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <strong>{{ $visitingCard->email }}</strong>
                                </div>
                                <div style="text-align: center; border: none; padding: 0; font-size: 20px; font-family: 'Poppins', sans-serif;" class="user-data-field">
                                    <i class="fa fa-hashtag" aria-hidden="true"></i>
                                    <strong>{{ $visitingCard->social }}</strong>
                                </div>
                            </div>
                        </div>                      

                    </div>                    
                </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" onclick="location.href='{{ route('viewpdf', ['id' => $visitingCard->id]) }}'" >View Card PDF</button>
                            <button class="btn btn-success" onclick="location.href='{{ route('downloadpdf', ['id' => $visitingCard->id]) }}'">Download Card PDF</button>
                        </div>
                        <div>
                            <br>
                        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
