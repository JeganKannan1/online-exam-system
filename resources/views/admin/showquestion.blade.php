@extends('layouts.app')
<div class = "col-md-6" style="margin: 100px 220px">
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
           <th class="text-center">Action</th>
           <th class="text-center">Action1</th>

        </tr>
        </thead>
       <tbody>
        
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
                <a href="{{route('change-question', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0">edit</a>
            </td>
            <td class="text-center">
                <a href="{{route('delete-question', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0">delete</a>
            </td>
           </tr>  
          @endforeach
         
       </tbody>
      </table>
</div>