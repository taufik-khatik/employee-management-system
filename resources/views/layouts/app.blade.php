<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Employee Management System')</title>

  <!-- Include CSS or Bootstrap CDN link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('employees.index') }}">Employee Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('employees.index') }}">Employee List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('employees.create') }}">Add Employee</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    @yield('content')
  </div>

  <!-- Include JavaScript or Bootstrap JS link -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>