<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" type="text/css" href="{{asset('images/logo.png')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('css/text.css')}}" rel="stylesheet">
    <title>Institution page</title>
</head>
<body style="background-image: url('images/back.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;background-attachment:fixed;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="" srcset="" width="10%">
            </div>
            <div class="row justify-content-center">
            <h5 class="mt-5 mx-5 font-weight-bold text-white" style="font-size: 40px;text-transform:uppercase">Bursary Management System</h5>
            </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 bg-light mt-5  py-2">
                <ul class="progressbar">
                  <li class="active font-weight-bold" style="color:green">Stu-Details</li>
                  <li  class="active font-weight-bold" style="color:green">School-Information</li>
                  <li  class="active font-weight-bold" style="color:green">Bursary-details</li>
                  <li class="font-weight-bold" style="color:green">Summary-Details</li>
        </ul>
		</div>
	</div>
</div>
<div class=" mt-5">
    <div class="card-header" style="background-color: #166659">
                {{-- <input type="text" name="bursary_name" class="form-control" placeholder="Bursary name" id="" value="{{$data['reg_no']}}">
                <input type="text" name="bursary_name" class="form-control" placeholder="Bursary name" id="" value="{{$data['second_name']}}"> --}}

        <h4 class="text-center font-weight-bold text-white">Bursary Details </h4>
    </div>
    <div class="card-body" style="background-color: rgb(206, 176, 138)">
        <form action="{{route('summary')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="font-weight-bold">Bursary Name :</label>
                    <input type="text" name="bursary_name" class="form-control font-weight-bold" placeholder="Bursary name" id="" value="CDF Bursary" readonly>
                    @if($errors->has('bursary_name'))
                    <span class="text-danger">{{$errors->first('bursary_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Bursary Type :</label>
                    <select name="bursary_type" id="" class="form-control font-weight-bold">
                        <option value="" selected><?php echo (old('bursary_type')) ? (old('bursary_type')) : '-Select Type Below-';?></option>
                        <option>NC NCDF</option>
                        <option>Elimu Fund</option>
                        <option>KCB Scholarship</option>
                        <option>ISK Scholarship Program</option>
                    </select>
                    @if($errors->has('bursary_type'))
                    <span class="text-danger">{{$errors->first('bursary_type')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Disburser :</label>
                    <input type="text" class="form-control font-weight-bold"name="disburser" value="County Government" readonly>
                    @if($errors->has('disburser'))
                    <span class="text-danger">{{$errors->first('disburser')}}</span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="first_name" class="form-control" placeholder="" id="" value="{{$data['first_name']}}">
            <input type="hidden" name="second_name" class="form-control" placeholder="" id="" value="{{$data['second_name']}}">
            <input type="hidden" name="age" class="form-control" placeholder="" id="" value="{{$data['age']}}">
            <input type="hidden" name="gender" class="form-control" placeholder="" id="" value="{{$data['gender']}}">
            <input type="hidden" name="parent_guardian_name" class="form-control" placeholder="" id="" value="{{$data['parent_guardian_name']}}">
            <input type="hidden" name="family_status" class="form-control" placeholder="" id="" value="{{$data['family_status']}}">
            <input type="hidden" name="phone" class="form-control" placeholder="" id="" value="{{$data['phone']}}">
            <input type="hidden" name="occupation" class="form-control" placeholder="" id="" value="{{$data['occupation']}}">
            <input type="hidden" name="email" class="form-control" placeholder="" id="" value="{{$data['email']}}">
            <input type="hidden" name="id_no" class="form-control" placeholder="" id="" value="{{$data['id_no']}}">
            <input type="hidden" name="county" class="form-control" placeholder="" id="" value="{{$data['county']}}">
            <input type="hidden" name="ward" class="form-control" placeholder="" id="" value="{{$data['ward']}}">
            <input type="hidden" name="location" class="form-control" placeholder="" id="" value="{{$data['location']}}">
            <input type="hidden" name="sub_location" class="form-control" placeholder="" id="" value="{{$data['sub_location']}}">
            <input type="hidden" name="fullname" class="form-control" placeholder="" id="" value="{{$data['fullname']}}">
            <input type="hidden" name="ward" class="form-control" placeholder="" id="" value="{{$data['ward']}}">
            <input type="hidden" name="location" class="form-control" placeholder="" id="" value="{{$data['location']}}">
            <input type="hidden" name="school_type" class="form-control" placeholder="" id="" value="{{$data['school_type']}}">
            <input type="hidden" name="reg_no" class="form-control" placeholder="" id="" value="{{$data['reg_no']}}">
            <input type="hidden" name="school_name" class="form-control" placeholder="" id="" value="{{$data['school_name']}}">
            <input type="hidden" name="bank_name" class="form-control" placeholder="" id="" value="{{$data['bank_name']}}">
            <input type="hidden" name="account_no" class="form-control" placeholder="" id="" value="{{$data['account_no']}}">

        
            <div class="row justify-content-between">
                <a href="{{route('school_details')}}" class="btn btn-success mt-5 font-weight-bold">
            PREVIOUS
        </a>
            <input type="submit" name="continue" class="btn btn-primary mt-5 font-weight-bold" style="" value="CONTINUE TO SUMMARY">
            </div>
        </form>
    </div>
</div>
</div>
</body>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootstrap/popper/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</html>