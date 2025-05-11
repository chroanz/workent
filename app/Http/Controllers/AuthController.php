<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    protected User $model;
 
    public function __construct()
    {
        $this->model = new User();
    }

    public function create()
    {
        return view('pages/auth/register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);
        $formFields['type'] = 'user';

        User::create($formFields);
        return redirect()->route("auth.login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = User::find(Auth::id());
        return redirect()->route($user->client == null ? 'profile.create' : 'home');
    }

    public function login()
    {
        return view('pages/auth/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.login");
    }

    /**
     * Display a listing of the resource.
     */
    public function employeeList()
    {
        return view('pages.admin.users.list', [
            'employees' => $this->model->where('type', '!=', 'user')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function employeeStore(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);
        $formFields['type'] = 'admin';

        User::create($formFields);

        return redirect('/funcionarios')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function employeeCreate()
    {
        return view('pages.admin.users.create');
    }
    
    public function employeeEdit(User $employee)
    {
        return view('pages.admin.users.edit', [
            'employee' => $employee,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function employeeShow(User $employee)
    {
        return view('pages/users/show', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function employeeUpdate(Request $request, User $employee)
    {
        $validate = request()->validate([
            'id' => 'required|integer',
            'email' => 'required|string|max:50',
            'type' => 'required|string|max:11',
            'password' => 'string|min:6|confirmed',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $employee->update($validate);

        return redirect('/funcionarios')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function employeeDestroy(User $employee)
    {
        $employee->delete();

        return redirect('/funcionarios')->with('success', 'Funcionário excluído com sucesso!');
    }
}
