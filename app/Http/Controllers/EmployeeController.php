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
        $validate = request()->validate([
            'email' => 'required|email|max:50',
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:11'
        ]);

        Employee::addEmployeeByEmail($validate);

        return redirect('/funcionarios')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function create()
    {
        return view('pages.admin.users.create');
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
        return view('pages/users/show', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validate = request()->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:11'
        ]);

        $employee->update($validate);

        return redirect('/funcionarios')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('/funcionarios')->with('success', 'Funcionário excluído com sucesso!');
    }
}
