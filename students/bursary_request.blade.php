<!DOCTYPE html>
<html lang="en">
    @include('config.head')

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('index')}}" class="logo">
						<img src="{{asset('images/logo.png')}}" alt="Logo">
					</a>
					<a href="{{url('index')}}" class="logo logo-small">
						<img src="{{asset('images/logo.png')}}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
				</a>
				<a class="mobile_btn" id="mobile_btn">
					<i class="fas fa-bars"></i>
				</a>
                        </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul >
							<li class="menu-title"> 
								<!--<span>Main Menu</span>-->
							</li>
							<li> 
								<a href="{{url('students/index')}}"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="{{url('students/new_applications')}}"><i class="fa fa-file"></i> <span>New Application</span></a>
							</li>
							
                            <li class="active"> 
								<a href="{{url('students/request_application')}}"><i class="fa fa-key"></i> <span>Request Application</span></a>
							</li>
							<li> 
								<a href="{{url('students/application')}}"><i class="fa fa-list"></i> <span>My Applications</span></a>
							</li>
							<li> 
								<a href="{{url('students/profile')}}"><i class="fa fa-user"></i> <span>Profile</span></a>
							</li>
					
							<li> 
								<a href="{{url('students/logout')}}"><i class="fa fa-cog"></i> <span>Logout</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header col-md-12">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active"><label style="font-weight: 900; color: #0f893b; font-size: 25px">BURSARY APPLICATION SYSTEM</label></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-12">
											<h5 class="font-weight-bold text-center" style="font-size: 30px"><span style="color: #0f893b">Bursary</span> - <span style="color: orange">Request</span></h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
								<div class="card-body">
									<div id="line_graph">
                                        @if(session()->has('message'))
                                        <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('message')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif
                                        @if(session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('success')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif
									</div>
                                    <div class="container-fluid col-md-8">
                                        <div class="card mt-3">
									<div class="card-header" style="background-color: #0f893b;color:white">
                                        <h4 class="text-center font-weight-bold">Enter The Following Details Below</h4>
                                    </div>
                                    <div class="card-body">
                                        <label for="" class="font-weight-bold">Parent Email or Phone :</label>
                                        <form method="post" action="{{url('student_request')}}">
                                            @csrf
                                        <input type="text" name="email" class="form-control <?php echo ($errors->first('email')) ? 'border border-danger' : '';?>" placeholder="Enter parent email or phone number here" id="">
                                        @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span><br>
                                        @endif
                                        <div class="row justify-content-between mx-auto">
                                        <input type="submit" value="REQUEST BURSARY" class="btn mt-3 font-weight-bold" style="background-color: #0f893b;color:white">
                                        </div>
                                        </form>
                                    </div>
                                        </div>
                                    </div>
								</div>
							</div>
							<!-- /Revenue Chart -->
							
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Wrapper -->

			
        </div>
		<!-- /Main Wrapper -->
		@include('config.scripts')
    </body>
	
    {{-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script> --}}
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('DataTables/DataTables-1.13.4/js/jquery.dataTables.js')}}"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );
    </script>
</html>