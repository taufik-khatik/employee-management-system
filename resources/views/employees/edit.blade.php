@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
  <div class="container">
    <div class='card'>
      <div class="card-header">
        <h1>Edit Employee</h1>
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
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
              </div>
              <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
              </div>
              <div class="form-group">
                <lable for="address">Address <span class="text-danger">*</span></lable>
                <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}" required>
              </div>
              <div class="form-group">
                <lable for="photo">Photo</lable>
                <input type="file" class="form-control" id="photo" name="photo">
                @if ($employee->photo)
                  <a href="{{ asset('storage/'.$employee->photo) }}" target="_blank">View Photo</a>
                  <!-- <img src="{{ asset('storage/'.$employee->photo) }}" alt="Employee Photo" width="100"> -->
                @else
                  <p>No Photo Uploaded</p>
                @endif
              </div>  
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
              </div>
              <div class="form-group">
                <label for="mobile_number">Mobile Number <span class="text-danger">*</span></label>
                <div class="input-group">
                  <select class="custom-select" id="country_code" name="country_code" required>
                    <option value="" selected disable>Select Country Code</option>
                    <option value="+1" {{ $employee->country_code == '1+' ? 'selected' : ''}}>+1 (US)</option>
                    <option value="+91" {{ $employee->country_code == '+91' ? 'selected' : ''}}>+91 (IN)</option>
                    <option value="+44" {{ $employee->country_code == '+44' ? 'selected' : ''}}>+44 (UK)</option>
                    <option value="+234" {{ $employee->country_code == '+234' ? 'selected' : ''}}>+234</option>
                    <option value="+65" {{ $employee->country_code == '+65' ? 'selected' : ''}}>+65</option>
                    <option value="+62" {{ $employee->country_code == '+62' ? 'selected' : ''}}>+62</option>
                    <option value="+81" {{ $employee->country_code == '+81' ? 'selected' : ''}}>+81</option>
                    <option value="+82" {{ $employee->country_code == '+82' ? 'selected' : ''}}>+82</option>
                    <option value="+86" {{ $employee->country_code == '+86' ? 'selected' : ''}}>+86</option>
                    <option value="+33" {{ $employee->country_code == '+33' ? 'selected' : ''}}>+33</option>
                    <option value="+32" {{ $employee->country_code == '+32' ? 'selected' : ''}}>+32</option>
                    <option value="+34" {{ $employee->country_code == '+34' ? 'selected' : ''}}>+34</option>
                    <option value="+39" {{ $employee->country_code == '+39' ? 'selected' : ''}}>+39</option>
                    <option value="+36" {{ $employee->country_code == '+36' ? 'selected' : ''}}>+36</option> 
                  </select>
                  <input type="number" class="form-control" id="mobile_number" name="mobile_number" value="{{ $employee->mobile_number }}" required>
                </div>
              </div>
              <div class="form-group">
                <label for="gender">Gender <span class="text-danger">*</span></label>
                <input type="radio" id="male" name="gender" value="male" {{ $employee->gender == 'male' ? 'checked' : ''}} required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" {{ $employee->gender == 'female' ? 'checked' : ''}} required>
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other" {{ $employee->gender == 'other' ? 'checked' : ''}} required>
                <label for="other">Other</label>
              </div>
              <div class="form-group">
                <label for="hobbies">Hobbies</label><br>
                <input type="checkbox" class="form-control" id="hobby_reading" name="hobbies[]" value="reading" {{ in_array('reading', $employee->hobbies) ? 'checked' : ''}}>
                <label for="hobby_reading">Reading</label>
                <input type="checkbox" class="form-control" id="hobby_sports" name="hobbies[]" value="sports" {{ in_array('sports', $employee->hobbies) ? 'checked' : ''}}>
                <label for="hobby_sports">Sports</label>
                <input type="checkbox" class="form-control" id="hobby_music" name="hobbies[]" value="music" {{ in_array('music', $employee->hobbies) ? 'checked' : ''}}>
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