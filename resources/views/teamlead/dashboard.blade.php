@extends('layouts.dashboard')
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
								<h3 class="page-title">Welcome TeamLead!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					
				<!-- /Page Content -->
				<div class="page-wrapper">
					<div class="content container-fluid">
				  <div id="linechart" style="width: 100%; height: 500px;"></div>
				</div>
			  </div>
			
			  <script  src="https://www.gstatic.com/charts/loader.js"></script>
			  
				<script>
				  var visitor = <?php echo $visitor; ?>;
				  console.log(visitor);
				  google.charts.load('current', {'packages':['corechart']});
				  google.charts.setOnLoadCallback(drawChart);
				  function drawChart() {
					var data = google.visualization.arrayToDataTable(visitor);
					var options = {
						title: 'Performance',
						curveType: 'function',
			
					};
					var chart = new google.visualization.LineChart(document.getElementById('linechart'));
					chart.draw(data, options);
				  }
				</script>
				</script>
            </div> 
			<!-- /Page Wrapper -->
			
        </div>

		@jquery
@toastr_js
@toastr_render
    </body>
</html>