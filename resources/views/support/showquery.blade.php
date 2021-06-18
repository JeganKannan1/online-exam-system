@extends('layouts.app')
@toastr_css

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (count($showQuery)>0)
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
                                @foreach ($showQuery as $query)
                                    <tr class="text-center">
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td class="text-center">{{ $query->Admin->username }}</td>
                                        <td class="text-center">{{ $query->Team->team_name }}</td>
                                        <td class="text-center">{{ $query->Test->test_title }}</td>
                                        <td class="text-center">{{ $query->query }}</td>
                                        @if(($query->re_assign)==0)
                                            <td class="text-center">
                                                <a href="delete-test/{{$query['user_id']}}/{{$query['test_id']}}">
                                                    <button class="btn btn-primary">Re-Assign Test</button>
                                                </a>
                                            </td>
                                        @else
                                            <td class="text-center">test re-assigned
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="col-md-12" >
                            <div class="text-center">
                                <img src="{{asset('assets/img/no_data.jpg')}}">
                                <h3>No Data Found</h3>
                            </div>
                        </div>
                    @endif
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
