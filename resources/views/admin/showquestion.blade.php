@extends('layouts.app')
@toastr_css

<div class="page-wrapper">
		<div class="content container-fluid">

    <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">S.no</th>
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
        @if (count($getTeams)>0)
          @foreach ($getTeams as $getTeam)
            <tr class="text-center">
            <td class="text-center">{{ $loop->index+1 }}</td>
            <td class="text-center">{{ $getTeam->question }}</td>
            <td class="text-center">{{ $getTeam->option1 }}</td>
            <td class="text-center">{{ $getTeam->option2 }}</td>
            <td class="text-center">{{ $getTeam->option3 }}</td>
            <td class="text-center">{{ $getTeam->option4 }}</td>
            <td class="text-center">{{ $getTeam->answer }}</td>
            <td class="text-center">
                <a href="{{route('change-question', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-right:20px;">edit</a>
                <a href="{{route('delete-question', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-right:20px;">delete</a>
            </td>
           </tr>
          @endforeach
          @else
            <div class="col-md-12" >
                <div class="card dash-widget">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{asset('assets/img/no_data.jpg')}}">
                            <h3>No Data Found</h3>
                        </div>
                    </div>
                </div>
            </div>
            </tr>
          @endif
       </tbody>
      </table>
</div>
</div>
</div>
</div>
</div>
</div>
@jquery
    @toastr_js
    @toastr_render
</body>
</html>
