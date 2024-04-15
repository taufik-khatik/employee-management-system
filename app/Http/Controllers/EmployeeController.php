<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        foreach($employees as $employee){
            $mobileData = explode(',', $employee->mobile_number);
            $employee->country_code = $mobileData[0];
            $employee->mobile_number = $mobileData[1];
        }
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'country_code' => 'required',
            'mobile_number' => 'required|numeric|digits:10',
            'address' => 'required',
            'gender' => 'required|in:male,female,other',
            'hobbies' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = new Employee();
        $employee->first_name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->email = $validatedData['email'];
        $employee->mobile_number = $validatedData['country_code'] . ',' . $validatedData['mobile_number'];
        $employee->address = $validatedData['address'];
        $employee->gender = $validatedData['gender'];
        $employee->hobbies = implode(',', $validatedData['hobbies'] ?? []);

        if($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/employee_photos');
            $employee->photo = str_replace('public/', '', $photoPath);
        }

        $employee->save();

        return redirect('/employees')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $employee->country_code = explode(',', $employee->mobile_number)[0];
        $employee->mobile_number = explode(',', $employee->mobile_number)[1];
        $employee->hobbies = explode(',', $employee->hobbies);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,
            'country_code' => 'required',
            'mobile_number' => 'required|numeric|digits:10',
            'address' => 'required',
            'gender' => 'required|in:male,female,other',
            'hobbies' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = Employee::find($id);
        $employee->first_name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->email = $validatedData['email'];
        $employee->mobile_number = $validatedData['country_code'] . ',' . $validatedData['mobile_number'];
        $employee->address = $validatedData['address'];
        $employee->gender = $validatedData['gender'];
        $employee->hobbies = implode(',', $validatedData['hobbies'] ?? []);

        if($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/employee_photos');
            $employee->photo = str_replace('public/', '', $photoPath);
        }

        $employee->save();

        return redirect('/employees')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }

}
