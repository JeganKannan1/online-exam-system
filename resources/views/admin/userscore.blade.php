 @extends('layouts.app')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>  
<script>$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>
</head>
<body>
<div class="page-wrapper">
		<div class="content container-fluid">
      <div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
<!-- <div class="container col-md-6" style="margin:220px"> -->
   
   

      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">S.NO</th>
           <th class="text-center">Date</th>
           <th class="text-center">Score</th>
        </tr>
        </thead>
       <tbody>
         @if(count($getTeam)>0)
          @foreach ($getTeam as $getReport)
               <tr class="text-center">
               <td class="text-center">{{ $loop->index+1 }}</td>
               <td class="text-center">{{ $getReport->created_at }}</td>
               <td class="text-center">{{ $getReport->score }}</td>
               </tr>
            @endforeach
         
       </tbody>
       @else
      <tbody>
         <tr class="text-center">
            <td class="text-center">
            </td>
            <td class="text-center"><h3>No data found</h3>
            </td>
            <td class="text-center">
            </td>
         </tr>
      @endif
      </table>
      
     
      
</div>
</div>
</div>
</div>
</div>
</div>
		
   
