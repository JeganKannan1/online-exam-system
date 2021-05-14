@extends('layouts.dashboard')
<div class="page-wrapper">
		<div class="content container-fluid">
            <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
                <h3></h3>
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">Id</th>
           <th class="text-center">questions</th>
           <th class="text-center">option1</th>
           <th class="text-center">option2</th>
           <th class="text-center">option3</th>
           <th class="text-center">option4</th>
           <th class="text-center">answer</th>
           <th class="text-center col-md-2">Action</th>

        </tr>
        </thead>
       <tbody>
        
          @foreach ($questions as $getTeam)
            <tr class="text-center">
            <td class="text-center">{{ $loop->index+1 }}</td>
            <td class="text-center">{{ $getTeam->question }}</td>
            <td class="text-center">{{ $getTeam->option1 }}</td>
            <td class="text-center">{{ $getTeam->option2 }}</td>
            <td class="text-center">{{ $getTeam->option3 }}</td>
            <td class="text-center">{{ $getTeam->option4 }}</td>
            <td class="text-center">{{ $getTeam->answer }}</td>
            <td class="text-center">
                <a href="{{route('edit-question', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-right:20px;">edit</a>
                <a href="{{route('delete-question', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-left:20px;">delete</a>
            </td>
           </tr>  
          @endforeach
         
       </tbody>
      </table>
</div>
</div>
</div>
</div>
</div>
</div>