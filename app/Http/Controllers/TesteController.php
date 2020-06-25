<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(User $user)
    {
        // $users = User::paginate();  
        $users = User::all();
    
        return view('teste.teste', compact('users'));
    }

    public function update(Request $request)
    {

        $user = User::findOrFail($request->users_id);

        $user->update($request->all());
       
        return redirect()->route('teste');
    }
}
