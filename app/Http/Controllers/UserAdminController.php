<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAdminController extends Controller
{
    protected $request;
    private $repository;
    
    public function __construct(Request $request, User $user)
    {
        $this->middleware('auth');
    
        $this->request = $request;
        $this->repository = $user;
    }
    
    public function index(User $user) 
    {
        $users = DB::table('users')->paginate(10);

            // $users = User::paginate(10);

            // $users = User::all();
    
            return view('users-list', ['users' => $users]);
    }

    public function destroy($id) {
        User::destroy($id);

        return back();
    }

    public function search(Request $request) {
        $filters = $request->except('_token');

        $users = $this->repository->search($request->filter);

        return view('users-list', [
            'users' => $users,
            'filters' => $filters
        ]);
    }

    public function update(Request $request)
    {

        $user = User::findOrFail($request->users_id);

        $user->update($request->all());

        return back();
        
    }

}
