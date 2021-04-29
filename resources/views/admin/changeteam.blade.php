@extends('layouts.app')
<div class="page-wrapper">
		<div class="content container-fluid">

  
        @if (count($errors) > 0)
           <div class = "alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
              </ul>
           </div>
        @endif

        <div class="page-header">
						<div class="row">
							<div class="col">
      <form action="{{route('update-team')}}" method = "POST">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{$editTeams->id}}" name="id">
        </div>
        
        <div class="form-group">
          <label>update team</label>
          <input type="text" class="form-control" id="team" name = "team_name" value="{{ $editTeams->team_name}}">
        </div>
        <button type="submit" class="btn btn-primary">update</button>
      </form>
    </div>
</div>
</div>
</div>
</div>

