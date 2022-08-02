<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Employee List";
        $listings = Employee::all();
        return view('employee.index', compact('header','listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = "Create Employee";
        return view('employee.form', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validate = $request->validate([
            'name' => 'required',
            'age' => ['required','numeric'],
            'gender' => 'required',
            'type' => 'required'
        ]);

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->type = $request->type;
        $employee->save();
        return redirect(route('employee.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $header = "Update Employee";
        $employee = Employee::Find($id);
        return view('employee.form', compact('header','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validate = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'type' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->type = $request->type;
        $employee->save();
        
        return redirect(route('employee.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id)->delete();
        return redirect(route('employee.index'));
    }
}
