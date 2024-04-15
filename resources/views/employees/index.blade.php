@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">Employees List</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Create Employee</a>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile Number</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          <tr>
            <th scope="row">{{ $employee->id }}</th>
            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->country_code }}{{ $employee->mobile_number }}</td>
            <td>
              <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
              <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>  
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection