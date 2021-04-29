@toastr_css
    <div class = "container-fluid" style="margin: 100px 100px">
        <div class="container"style="margin: 100px 100px">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
      </div>
      <div class = "col-md-6" style="margin: 100px 220px">
            <form action="{{route('send-mail')}}" method = "POST">
                @csrf
                <div class="form-group">
                    <label>Enter your registered email address</label>
                        <input type="email" class="form-control" id="email" name = "email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  
		@jquery
@toastr_js
@toastr_render
		<!-- Custom JS -->
</body>
</html>

