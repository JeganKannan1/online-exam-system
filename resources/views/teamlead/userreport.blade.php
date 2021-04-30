@extends('layouts.dashboard')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>  
<script>$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>
<div class="page-wrapper">
		<div class="content container-fluid">
      <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">Id</th>
           <th class="text-center">Date</th>
           <th class="text-center">Score</th>
        </tr>
        </thead>
       <tbody>
        
          @foreach ($userReport as $getReport)
            <tr class="text-center">
            <td class="text-center">{{ $getReport->id }}</td>
            <td class="text-center">{{ $getReport->created_at }}</td>
            <td class="text-center">{{ $getReport->score }}</td>
          @endforeach
         
       </tbody>
      </table>
</div>
</div>
</div>
</div>
</div>
</div>
