@toastr_css

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Forgot-Password</title>
		
		<!-- Favicon -->
        <!-- <link rel="shortcut icon" type="image/x-icon"> -->
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		@toastr_css

    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
                <div class="account-logo">
						<a href="#"><img src="assets/img/sparkout.png"></a>
					</div>
                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{route('send-mail')}}" method = "POST">
                @csrf
                <div class="account-box">
					<div class="account-wrapper">
                    <h3 class="account-title">Forgot-Password</h3></br>
                <div class="form-group">
                    <label>Enter your registered email address</label>
                        <input type="email" class="form-control" id="email" name = "email" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
            </form>
        </div>
    </div>
</div>
		@jquery
@toastr_js
@toastr_render
		<!-- Custom JS -->
</body>
</html>

