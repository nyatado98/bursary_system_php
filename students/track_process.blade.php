<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" type="text/css" href="{{asset('images/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('css/text.css')}}" rel="stylesheet">
    <title>User application details</title>
    <style>
        hr{
            color: white;
        }
        </style>

</head>
<body style="background-image: url('images/back.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;background-attachment:fixed;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="" srcset="" width="10%">
            </div>
            <div class="row justify-content-center">
            <h5 class="mt-5 mx-5 font-weight-bold text-white" style="font-size: 40px;text-transform:uppercase">Bursary Management System</h5>
            </div>
        <hr>
        <div class="containe-fluid">
            <div class="column">
                <ol>
                    <p class="text-white">Pending : Initial status of the application when applied.</p>
                    <p class="text-white">Staged : Status of the application after first review.</p>
                    <p class="text-white">Finalizing : Status state after the final revision.</p>
                    <p class="text-white">Approved : Status state if you have gotten the bursary.</p>
                    <p class="text-white">Denied : Status state if you haven't secured a busary.</p>
                </ol>
            </div>
        </div>
        <div class="container-fluid col-md-10 mt-5">
            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover table-striped">
                    <thead>
                        <tr>
                            <td colspan="3"><a href="{{url('track_process')}}" class="btn btn-danger mt-3 font-weight-bold">BACK</a></td>
                        </tr>
                        <tr>
                            <td class="text-center font-weight-bold">#</td>
                            <td class="text-center font-weight-bold">REF NO :</td>
                            <td class="text-center font-weight-bold">STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $values)
                        <tr>
                            <td>{{$values->id}}</td>
                            <td>{{$values->reference_number}}</td>
                            <td class="text-center text-warning font-weight-bold" style="font-size: 18px">{{$values->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/popper/popper.min.js')}}"></script>
</html>