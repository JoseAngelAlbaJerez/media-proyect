<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function mostrarSidebar()
    {
        $usuarios = User::all();
        return view('layouts.navbars.sidebar', compact('usuarios'));
    }
    public function show($id)
    {
        $userItem = User::findOrFail($id);
        $videos = $userItem->multimedia;
        return view('users.show', compact('userItem','videos'));
    }
    
    
 
}
