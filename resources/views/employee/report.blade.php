@extends('layouts.user')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>  
<script>$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>
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