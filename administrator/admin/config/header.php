<?php
// include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
?>
<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard" class="logo">
						<img src="./images/CDF LOGO.jpg" alt="Logo">
					</a>
					<a href="dashboard" class="logo logo-small">
						<img src="./images/CDF LOGO.jpg" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
				</a>
					<label id="none" style="font-weight: 900; margin-top: 1%; color: #0f893b; font-size: 25px; margin-left: 7%;">BURSARY MANAGEMENT SYSTEM</label>
					&emsp;&emsp;&emsp;
					
				
				
				<!-- Search Bar -->
				<!--<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>-->
				<!-- /Search Bar -->
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fas fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu" id="ul">

					<!-- Notifications -->
					<!--<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="far fa-bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
												</span>
												<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>-->
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="dashboard" class="dropdown-toggle nav-link" data-toggle="dropdown" id="menu1">
							<!-- <img class="rounded-circle" src="" width="31" alt="User Loggedin"> -->
							<span class="user-img"><?php echo $_SESSION['email'];?></span>
						</a>
						<div class="dropdown-menu"  role="menu"  aria-labelledby="menu1">
							<div class="user-header">
								 <!-- <div class="avatar avatar-sm">
									<img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
								</div>  -->
								<div class="user-text">
												<!-- @if(session('res'))
    @foreach(session('res') as $value)
    <p>{{$value->email}}</p>
    @endforeach
    @endif -->
								</div>
							</div>
							<a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
							
							
							<a class="dropdown-item" href="{{url('logout')}}">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->