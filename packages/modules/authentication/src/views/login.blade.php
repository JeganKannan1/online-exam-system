<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Login - HRMS admin template</title>

<!-- Favicon -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





</head>
<body class="account-page">

<!-- Main Wrapper -->
<div class="main-wrapper">
<div class="account-content">
<!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
<div class="container">

<!-- Account Logo -->
<div class="account-logo">

</div>
<!-- /Account Logo -->

<div class="account-box">
<div class="account-wrapper">
<h3 class="account-title">Login</h3>
<p class="account-subtitle">Access to our dashboard</p>

<!-- Account Form -->
<form action="{{route('login-admin')}}" method = "POST">
    @csrf
<div class="form-group">
<label>User Name</label>
<input class="form-control" type="text" name= "username">
</div>
<div class="form-group">
<div class="row">
<div class="col">
<label>Password</label>
</div>
<div class="col-auto">
{{-- <a class="text-muted" href="#">
Forgot password?
</a> --}}
</div>
</div>
<input class="form-control" type="password" name = "password">
</div>
<div class="form-group text-center">
<button class="btn btn-primary account-btn" type="submit">Login</button>
</div>

</form>
<!-- /Account Form -->

</div>
</div>
</div>
</div>
</div>
<!-- /Main Wrapper -->



</body>
</html>