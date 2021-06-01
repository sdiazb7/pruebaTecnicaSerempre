<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
		
        $users = User::orderBy('id','DESC')->paginate(10);

        $title = 'Listado de usuarios';
 
        return view('users.index', compact('title', 'users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
			'email.required' => 'El campo email es obligatorio',
			'password.required' => 'El campo password es obligatorio',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);


      return redirect()->back()->with('alert', 'Se registro el usuario');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => '',
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

      return redirect()->back()->with('alert', 'Se actuolizo el usuario');
    }

    function destroy(User $user)
    {
        $user->delete();

      return redirect()->back()->with('alert', 'Se elimino el usuario');  
    }
}
