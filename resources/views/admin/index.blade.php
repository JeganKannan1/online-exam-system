@extends('layouts.app')
@toastr_css

			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h2 class="page-title">Welcome Admin!</h2>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>			

						<div class="row row-card">
							@foreach ($getUsers as $getUser)
								
								<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
									<div class="card dash-widget">
										<div class="card-body">
											<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
											<div class="dash-widget-info">
												<h3 >{{$getUser->team_name}}</h3>
											</div>
										</div>
									</div>
								</div>
							@endforeach

														
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 text-center">
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Total Revenue</h3>
												<div id="bar-charts"></div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>	
					</div>
					
               </div> 
            </div>    
				
			
		@jquery
@toastr_js
@toastr_render
  