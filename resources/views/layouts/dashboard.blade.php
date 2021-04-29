<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Team Lead</title>
		
		<!-- Favicon -->
        <!-- <link rel="shortcut icon" type="image/x-icon"> -->
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset('/assets/css/line-awesome.min.css')}} ">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{asset('/assets/plugins/morris/morris.css')}} ">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('/assets/css/style.css')}} ">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="{{asset('/assets/css/bootstrap.min.css')}} /assets/js/html5shiv.min.js"></script>
			<script src="{{asset('/assets/css/bootstrap.min.css')}} /assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="#" class="logo">
						<img src="{{asset('/assets/img/sparkout.png')}}" alt="">
					</a>
                </div>
				<!-- /Logo -->
				
				 <a id="toggle_btn" href="javascript:void(0);" style="margin: 20px">
					<!-- <span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span> -->
				</a> 
				
				<!-- Header Title -->
                <!-- <div class="page-title-box">
					<h3>Sparkout Tech</h3>
                </div> -->
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar/teamsidebar"><i class="fa fa-bars"></i></a>
				
				<!-- Header Menu -->
			 <ul class="nav user-menu">
				
			
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="{{asset('/assets/img/profiles/avatar-21.jpg')}} " alt="">
							<span class="status online"></span></span>
							<span>TeamLead</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">My Profile</a>
							<!-- <a class="dropdown-item" href="#">Settings</a> -->
							<a class="dropdown-item" href="/logout">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="/logout">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
            {{-- <div class="flex"> --}}
                @include('sidebar.teamsidebar')
    
                @yield('content')
            {{-- </div> --}}
			<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
		
				<!-- Bootstrap Core JS -->
				<script src="{{asset('assets/js/popper.min.js')}}"></script>
				<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
				
				<!-- Slimscroll JS -->
				<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
				
				<!-- Chart JS -->
				<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
				<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
				<script src="{{asset('assets/js/chart.js')}}"></script>
			<script src="{{asset('assets/js/app.js')}}"></script>

			</body>
			</html>