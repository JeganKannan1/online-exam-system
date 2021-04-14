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
    <form>
        <div class="form-row">
          <div class="form-group col-md-6">
          <label for="inputEmail4">UserName</label>
          <input type="name" class="form-control" id="username" placeholder="Enter the Username">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="name" class="form-control" id="name" placeholder="Enter the Username">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter the email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter the Password" value="sparkout">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Phone Number</label>
          <input type="text" class="form-control" id="PhoneNumber" placeholder="Enter the Phone Number">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Select Team</label>
        <select class="form-control" name="city_id">
            @foreach ($teamname as $team)
                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Select Role</label>
      <select class="form-control" name="city_id">
          @foreach ($rolename as $role)
              <option value="{{ $role->id }}">{{ $role->role_name }}</option>
          @endforeach
      </select>
      </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>