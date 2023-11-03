{{-- <?php 
session_start();
$token = bin2hex(random_bytes(32)); // Generate a 32-byte token
$_SESSION['csrf_token'] = $token;

if(isset($_POST['continue'])){
    if (isset($_POST['csrf_token']) == $_SESSION['csrf_token']) {
    header("location:institution");
    }else{
        die("CSRF Token Validation Failed");
    }
}

?> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="text/css" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('css/text.css')}}" rel="stylesheet">
    <title>Applicants index page</title>
</head>
<body style="background-image: url('images/back.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;background-attachment:fixed;">
    <div class="container-fluid" >
        {{-- <div class="row justify-content-center " id="header" > --}}
            <div class="row justify-content-center">
            <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="" srcset="" width="10%">
            </div>
            <div class="row justify-content-center">
            <h5 class="mt-5 mx-5 font-weight-bold text-white" style="font-size: 41px;text-transform:uppercase">Bursary Management System</h5>
            </div>
        {{-- </div> --}}
        </div>
        <div class="container-fluid">
    <div class="row">
		<div class="col-md-12 bg-light mt-5  py-2">
		<ul class="progressbar">
          <li class="active font-weight-bold" style="color:green">Stu-Details</li>
          <li  class="font-weight-bold" style="color:green">School-Information</li>
          <li  class="font-weight-bold" style="color:green">Bursary-details</li>
          <li class="font-weight-bold" style="color:green">Summary-Details</li>
        </ul>
		</div>
	</div>
</div>
<div class="column mt-5">
    <p class="font-weight-bold mx-4 text-white font-italic" style="font-size: 20px;">If you have registered before, no need to register again just request for a bursary <a href="{{url('request_bursary')}}" style="text-decoration: underline;color:#010178">Request a Bursary Here.</a></p>
    <p class="font-weight-bold mx-4 mt-3 text-white font-italic" style="font-size: 20px">You can also track your bursary request process <a href="{{route('track_process')}}" style="text-decoration: underline;color:#010178"> Track process Here.</a></p>
</div>
<div class=" mt-5">
    <div class="card-header" id="head" style="background-color: #166651">
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
            <span class="font-weight-bold">{{session()->get('message')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
        @endif
        @if(session()->has('success'))
        <p class="font-weight-bold text-success">{{session()->get('success')}}</p>
        @endif
        <h4 class="text-center font-weight-bold text-white">Fill Your Details here</h4>
    </div>
    <div class="card-body" style="background-color: rgb(206, 176, 138)">
        <form action="{{url('school_details')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter First Name :</label>
                    <input type="text" name="first_name" class="form-control <?php echo ($errors->first('first_name')) ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter your first name" value="{{old('first_name')}}">
                    @if($errors->has('first_name'))
                    <span class="text-danger">{{$errors->first('first_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter Second Name :</label>
                    <input type="text" name="second_name" class="form-control <?php echo ($errors->first('second_name')) ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter your second name" value="{{old('second_name')}}">
                    @if($errors->has('second_name'))
                    <span class="text-danger">{{$errors->first('second_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Age :</label>
                    <select name="age" class="form-control <?php echo ($errors->first('age')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('age')) ? old('age') : '-select age-';?></option>
                        <?php
    for ($i = 13; $i <= 27; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
    ?>
                    </select>
                    @if($errors->has('age'))
                    <span class="text-danger">{{$errors->first('age')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
            <div class="col-md-6">
                    <label class="font-weight-bold">Gender :</label>
                    <select name="gender" class="form-control <?php echo ($errors->first('gender')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('gender')) ? old('gender') : '-select gender-';?></option>
                        <option> Male</option> 
                        <option>Female</option>
                    </select>
                    @if($errors->has('gender'))
                    <span class="text-danger">{{$errors->first('gender')}}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Family Status :</label>
                    <select name="family_status" class="form-control <?php echo ($errors->first('family_status')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('family_status')) ? old('family_status') : '-select status-';?></option>
                        <option>Rich</option>
                        <option>Average</option>
                        <option>Poor</option>
                        <option>Other</option>
                    </select>
                    @if($errors->has('family_status'))
                    <span class="text-danger">{{$errors->first('family_status')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
            <div class="col-md-4">
                    <label class="font-weight-bold">Enter Parent/Guardian Name :</label>
                    <input type="text" name="parent_guardian_name" value="{{old('parent_guardian_name')}}" class="form-control font-weight-bold <?php echo ($errors->first('parent_guardian_name')) ? 'border border-danger' : '';?>" placeholder="Enter parent name">
                    @if($errors->has('parent_guardian_name'))
                    <span class="text-danger">{{$errors->first('parent_guardian_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter Phone No :</label>
                    <input type="number" name="phone" class="form-control font-weight-bold <?php echo ($errors->first('phone')) ? 'border border-danger' : '';?>" placeholder="Enter phone number" value="{{old('phone')}}">
                    @if($errors->has('phone'))
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Occupation :</label>
                    <select name="occupation" class="form-control <?php echo ($errors->first('occupation')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('occupation')) ? old('occupation') : '-select occupation-';?></option>
                        <option>Employed</option>
                        <option>Self-employed</option>
                        <option>Contract</option>
                        <option>Unemployed</option>
                        <option>Others</option>
                    </select>
                    @if($errors->has('occupation'))
                    <span class="text-danger">{{$errors->first('occupation')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="font-weight-bold">Email :</label>
                    <input type="email" name="email" placeholder="Enter the parent email address" class="form-control font-weight-bold <?php echo ($errors->first('email')) ? 'border border-danger' : '';?>" id="" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Id No :</label>
                    <input type="number" name="id_no" placeholder="Enter the parent id number" class="form-control font-weight-bold <?php echo ($errors->first('id_no')) ? 'border border-danger' : '';?>" id="" value="{{old('id_no')}}">
                    @if($errors->has('id_no'))
                    <span class="text-danger">{{$errors->first('id_no')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <label class="font-weight-bold">County :</label>
                    <select name="county" class="form-control <?php echo ($errors->first('county')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('county')) ? old('county') : '-select county-';?></option>
                        <option>Uasin Gishu</option>
                    </select>
                    @if($errors->has('county'))
                    <span class="text-danger">{{$errors->first('county')}}</span>
                    @endif
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold">Ward :</label>
                    <select name="ward" class="form-control <?php echo ($errors->first('ward')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('ward')) ? old('ward') : '-select ward-';?></option>
                        <option>Ziwa</option>
                        <option>Soy</option>
                        <option>Kipsomba</option>
                        <option>Kaptagat</option>
                        <option>Kapsoya</option>
                        <option>Moiben</option>
                    </select>
                    @if($errors->has('ward'))
                    <span class="text-danger">{{$errors->first('ward')}}</span>
                    @endif
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold">Location :</label>
                    <select name="location" class="form-control <?php echo ($errors->first('location')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('location')) ? old('location') : '-select location-';?></option>
                        <option>Munyaka</option>
                        <option>Silas</option>
                        <option>Ilula</option>
                        <option>Block 10</option>
                        <option>Marura</option>
                    </select>
                    @if($errors->has('location'))
                    <span class="text-danger">{{$errors->first('location')}}</span>
                    @endif
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold">Sub-Location :</label>
                    <select name="sub_location" class="form-control <?php echo ($errors->first('sub_location')) ? 'border border-danger' : '';?> font-weight-bold">
                        <option value="" selected><?php echo(old('sub_location')) ? old('sub_location') : '-select sub-location-';?></option>
                        <option>Subaru</option>
                        <option>Bondeni</option>
                        <option>Kamkunji</option>
                        <option>Airstrip</option>
                    </select>
                    @if($errors->has('sub_location'))
                    <span class="text-danger">{{$errors->first('sub_location')}}</span>
                    @endif
                </div>
            </div>
            <input type="submit" name="continue" class="btn mt-5 font-weight-bold mb-4" style="float: right;color:white;background-color:#166651" value="CONTINUE TO NEXT">
        </form>
    </div>
</div>
</div>

</body>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootstrap/popper/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</html>