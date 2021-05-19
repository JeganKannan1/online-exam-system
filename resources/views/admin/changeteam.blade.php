@extends('layouts.app')
@toastr_css

<div class="page-wrapper">
		<div class="content container-fluid">

  
         @if (count($errors) > 0)
         <ul>
           @foreach ($errors->all() as $error)
         <?php toastr()->error($error);?>
           @endforeach
         </ul>
       @endif

        <div class="page-header">
						<div class="row">
							<div class="col">
      <form action="{{route('update-team')}}" method = "POST">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{$editTeams->id}}" name="id" required>
        </div>
        
        <div class="form-group">
          <label>Update Tseam</label>
          <input type="text" class="form-control" id="team" name = "team_name" value="{{ $editTeams->team_name}}" required>
        </div>
        <button type="submit" class="btn btn-primary">update</button>
      </form>
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
    