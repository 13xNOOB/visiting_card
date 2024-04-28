<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Visiting Card</title>
</head>
<body>

    <div style="display: flex; justify-content: center; align-items: center;">
        <h1 style="margin-right: 20px;">Submit Data</h1>
        
        <form action="{{URL::to('/dashboard')}}" method="get" style="margin-bottom: 0;">
            <button class="btn btn-success">Dashboard</button>                        
        </form>
    </div>

    
    <form action="{{url('/')}}/submitdata" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 mb-2 bg-light border" style="height: 200px;">
                    <label for="companyLogoUpload" class="form-label">Company Logo(PNG only)</label>
                    <input type="file" class="form-control" id="companyLogoUpload" name="companyLogo">
                    <span class="text-danger">
                        @error('companyLogo')
                            {{$message}} <br>  
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 mb-2 bg-light border">
                    <label for="ownerName">Owner Name</label>
                    <input type="text" class="form-control" id="ownerName" name="ownerName" value="{{old('ownerName')}}">
                    <span class="text-danger">
                        @error('ownerName')
                            {{$message}} <br>  
                        @enderror
                    </span>
                    <label for="ownerDesignation">Owner Designation</label>
                    <input type="text" class="form-control" id="ownerDesignation" name="ownerDesignation" value="{{old('ownerDesignation')}}">
                    <span class="text-danger">
                        @error('ownerDesignation')
                            {{$message}} <br>  
                        @enderror
                    </span>
                    <label for="ownerContactNumber">Owner Contact Number</label>
                    <input type="tel" class="form-control" id="ownerContactNumber" name="ownerContactNumber" value="{{old('ownerContactNumber')}}">
                    <span class="text-danger">
                        @error('ownerContactNumber')
                            {{$message}} <br>  
                        @enderror
                    </span>
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{old('location')}}">
                    <span class="text-danger">
                        @error('location')
                            {{$message}} <br>  
                        @enderror
                    </span>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                    <span class="text-danger">
                        @error('email')
                            {{$message}} <br>  
                        @enderror
                    </span>
                    <label for="social">Social</label>
                    <input type="text" class="form-control" id="social" name="social" value="{{old('social')}}">
                    <span class="text-danger">
                        @error('social')
                            {{$message}} <br>  
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>
