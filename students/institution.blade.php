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
                  <li  class="font-weight-bold" style="color:green">Bursary-details</li>
                  <li class="font-weight-bold" style="color:green">Summary-Details</li>
        </ul>
		</div>
	</div>
</div>
<div class="mt-5">
    <div class="card-header" style="background-color: #166659">
        <h4 class="text-center font-weight-bold text-white">Fill School Details here</h4>
    </div>
    <div class="card-body" style="background-color: rgb(206, 176, 138)">
        <form action="{{route('bursary')}}" method="post">
            @csrf
            @method('post')
            <div class="row">              
                <div class="col-md-4">
                    <label class="font-weight-bold">Institution :</label>
                    <select name="school_type" class="form-control">
                        <option value="" selected><?php echo(old('school_type')) ? old('school_type') : '-select school-';?></option>
                        <option>Primary school</option>
                        <option>Secondary School</option>
                        <option>University/College/TVET</option>
                    </select>
                    @if($errors->has('school_type'))
                    <span class="text-danger">{{$errors->first('school_type')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter UPI No/Adm No/Reg No :</label>
                    <input type="text" name="reg_no" class="form-control" placeholder="Enter your upi/adm/reg no." value="{{old('reg_no')}}">
                    @if($errors->has('reg_no'))
                    <span class="text-danger">{{$errors->first('reg_no')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">School name :</label>
                    <select name="school_name" class="form-control" id="">
                        <option>{{old('school_name')}}</option>
                        <option selected value="">-select your school-</option>
                        <option>Umoja High</option>
                        <option>Kimumu Secondary School</option>
                        <option>UG High School</option>
                        <option>64 Secondary School</option>
                        <option>Central Secondary School</option>
                    </select>
                    {{-- <input type="text" class="form-control" name="school_name" placeholder="Enter achool name" value="{{old('school_name')}}"> --}}
                    @if($errors->has('school_name'))
                    <span class="text-danger">{{$errors->first('school_name')}}</span>
                    @endif
                </div>
            </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Bank Name :</label>
                        <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" id="" value="{{old('bank_name')}}">
                        @if($errors->has('bank_name'))
                    <span class="text-danger">{{$errors->first('bank_name')}}</span>
                    @endif
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Bank Acc-No :</label>
                        <input type="number" name="account_no" class="form-control" placeholder="Enter account number" id="" value="{{old('account_no')}}">
                        @if($errors->has('account_no'))
                    <span class="text-danger">{{$errors->first('account_no')}}</span>
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

            <!-- <div class="row mt-4">
            <div class="col-md-6">
                    <label class="font-weight-bold">Gender :</label>
                    <select name="gender" class="form-control">
                        <option value="">-select gender-</option>
                        <option> Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Family Status :</label>
                    <select name="family_status" class="form-control">
                        <option value="">-select status-</option>
                        <option>Rich</option>
                        <option>Average</option>
                        <option>Poor</option>
                        <option>Other</option>
                    </select>
                </div>
            </div> -->
            <!-- <div class="row mt-4">
            <div class="col-md-6">
                    <label class="font-weight-bold">Enter Parent/Guardian Name :</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter parent name">
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Enter Phone No :</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                </div>
            </div> -->
            <!-- <div class="row mt-4">
                <div class="col-md-4">
                    <label class="font-weight-bold">County :</label>
                    <select name="county" class="form-control">
                        <option value="">-select county-</option>
                        <option></option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Ward :</label>
                    <select name="ward" class="form-control">
                        <option value="">-select ward-</option>
                        <option></option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Location :</label>
                    <select name="location" class="form-control">
                        <option value="">-select location-</option>
                        <option></option>
                    </select>
                </div>
            </div> -->
            <div class="row justify-content-between">
                <a href="{{route('back')}}" name="index" class="btn btn-success mt-5 font-weight-bold">
            {{-- <input type="submit" name="previous" class="btn btn-success mt-5 font-weight-bold" style="float: left" value="PREVIOUS"> --}}
            PREVIOUS
        </a>
            <input type="submit" name="continue" class="btn btn-primary mt-5 font-weight-bold" style="" value="CONTINUE TO NEXT">
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