<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Reset-Password</title>
		
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
				    <div class = "container col-md-12">
                        <form action="{{route('update-password')}}" method = "POST">
                            @csrf
                            <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name = "id" value = '{{$editUsers->id}}'>
                            </div>
                            <div class="form-group">
                            <label>Create new password</label>
                            <input type="password" class="form-control" id="password" name = "password">
                            </div>
                            <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" id="password1" name = "password1">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    @jquery
@toastr_js
@toastr_render
</body>
</html>