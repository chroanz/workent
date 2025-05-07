<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected Employee $model;

    public function __construct()
    {
        $this->model = new Employee();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.users.list', [
            'employees' => $this->model->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function create()
    {
        return view('pages/users/create');
    }
    
    public function edit(Employee $employee)
    {
        return view('pages/users/edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
