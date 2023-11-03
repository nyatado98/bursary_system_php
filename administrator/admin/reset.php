<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
    <title>reset password</title>
</head>
<body>
    <div class="container-fluid col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center font-weight-bold">Reset password here</h4>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                                        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('message')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif
    <form method="POST" action="{{url('reset_pass')}}">
        @csrf
        <input type="hidden" name="email" class="form-control" value="{{$email_reset}}">
        <label>Enter Password</label>
        <input type="password" name="password" class="form-control" id="" value="{{old('password')}}">
        @if($errors->has('password'))
        <span class="text-danger">{{$errors->first('password')}}</span><br>
        @endif
        <label for="">Re-enter password</label>
        <input type="password" name="re_password" class="form-control" id="" value="{{old('re_password')}}">
        @if($errors->has('re_password'))
        <span class="text-danger">{{$errors->first('re_password')}}</span><br>
        @endif
        <input type="submit" value="RESET PASSWORD" class="btn btn-primary mt-2">
    </form>
        </div>
    </div>
    </div>
</body>
<script src={{asset('bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('bootstrap/popper/popper.min.js')}}></script>
<script src={{asset('bootstrap/js/bootstrap.js')}}></script>
</html>