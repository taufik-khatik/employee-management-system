@extends('layouts.app')

@section('content')
  <div class="container">
    <div class='card'>
      <div class="card-header">
        <h1>Add Employee</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
              </div>
              <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <lable for="address">Address <span class="text-danger">*</span></lable>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
              <div class="form-group">
                <lable for="photo">Photo</lable>
                <input type="file" class="form-control" id="photo" name="photo">
              </div>  
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
              </div>
              <div class="form-group">
                <label for="mobile_number">Mobile Number <span class="text-danger">*</span></label>
                <div class="input-group">
                  <select class="custom-select" id="country_code" name="country_code" required>
                    <option value="" selected disable>Select Country Code</option>
                    <option value="+1">+1 (US)</option>
                    <option value="+91">+91 (IN)</option>
                    <option value="+44">+44 (UK)</option>
                    <option value="+234">+234</option>
                    <option value="+65">+65</option>
                    <option value="+62">+62</option>
                    <option value="+81">+81</option>
                    <option value="+82">+82</option>
                    <option value="+86">+86</option>
                    <option value="+33">+33</option>
                    <option value="+32">+32</option>
                    <option value="+34">+34</option>
                    <option value="+39">+39</option>
                    <option value="+36">+36</option> 
                  </select>
                  <input type="number" class="form-control" id="mobile_number" name="mobile_number" required>
                </div>
              </div>
              <div class="form-group">
                <label for="gender">Gender <span class="text-danger">*</span></label>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other" required>
                <label for="other">Other</label>
              </div>
              <div class="form-group">
                <label for="hobbies">Hobbies</label><br>
                <input type="checkbox" class="form-control" id="hobby_reading" name="hobbies[]" value="reading">
                <label for="hobby_reading">Reading</label>
                <input type="checkbox" class="form-control" id="hobby_sports" name="hobbies[]" value="sports">
                <label for="hobby_sports">Sports</label>
                <input type="checkbox" class="form-control" id="hobby_music" name="hobbies[]" value="music">
                <label for="hobby_music">Music</label>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection