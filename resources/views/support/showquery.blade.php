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
           <th class="text-center">User</th>
           <th class="text-center">Team</th>
           <th class="text-center">Test Name</th>
           <th class="text-center">Query</th>
           <th class="text-center">Action</th>
        </tr>
        </thead>
       <tbody>
        @if (count($showQuery)>0)
          @foreach ($showQuery as $query)
            <tr class="text-center">
            <td class="text-center">{{ $loop->index+1 }}</td>
            <td class="text-center">{{ $query->Admin->username }}</td>
            <td class="text-center">{{ $query->Team->team_name }}</td>
            <td class="text-center">{{ $query->Test->test_title }}</td>
            <td class="text-center">{{ $query->query }}</td>
            @if(($query->re_assign)==0)
            <td class="text-center">
                <a href = "delete-test/{{$query['user_id']}}/{{$query['test_id']}}"><button class="btn btn-primary">Re-Assign Test</button></a>
            </td>
            @else
            <td class="text-center">test re-assigned
            </td>
            @endif
           </tr>  
          @endforeach
          @else
          <tr class="text-center">
<h3>No data found</h3>
@endif  
          </tr>
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
