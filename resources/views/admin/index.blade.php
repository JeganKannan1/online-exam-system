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
							@foreach ($getTeam as $getUser)
								
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
						<div class="content container-fluid">
							<div id="linechart" style="width: 100%; height: 500px;"></div>
						  </div>
					</div>
					
               </div> 
            </div>  
			<script  src="https://www.gstatic.com/charts/loader.js"></script>
  
    <script>
		var visitor = <?php echo $visitor; ?>;
				  console.log(visitor);
           google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Teams');
      data.addColumn('number', 'php');
      data.addColumn('number', 'nodejs');
      data.addColumn('number', 'android');
	  data.addColumn('number', 'ios');
	  data.addColumn('number', 'testing');
      data.addRows(visitor);

      var options = {
        chart: {
          title: 'Team performance',
          subtitle: 'per test'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
    </script>  
				
			
		@jquery
@toastr_js
@toastr_render
  