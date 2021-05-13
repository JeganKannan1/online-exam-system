@extends('layouts.user')
@toastr_css

			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome employee!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
						<div id="test_name"></div>
					</div>
					
				<!-- /Page Content -->

            </div> 
			<!-- /Page Wrapper -->
			
        </div>

		@jquery
@toastr_js
@toastr_render
    </body>
</html>