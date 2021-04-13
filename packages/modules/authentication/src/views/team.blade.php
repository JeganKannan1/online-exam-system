
      
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
	
    <body>
      
      <form action="{{route('create-team')}}" method = "POST">
        @csrf
        
        <div class="form-group">
          <label>create new team</label>
          <input type="text" class="form-control" id="team" name = "team_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@if(isset($getTeams))
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">Id</th>
           <th class="text-center">Name</th>
           <th class="text-center">Action</th>
           <th class="text-center">Action1</th>
        </tr>
        </thead>
       <tbody>
        
          @foreach ($getTeams as $getTeam)
            <tr class="text-center">
            <td class="text-center">{{ $getTeam->id }}</td>
            <td class="text-center">{{ $getTeam->team_name }}</td>

            <td class="text-center">
              <a href="{{route('edit', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0">Edit</a>
            </td>
              <td class="text-center">
              <a href="{{route('delete', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0">delete</a>
            </td>
           </tr>  
          @endforeach
         
       </tbody>
      </table>
    @endif
</body>
</html>

