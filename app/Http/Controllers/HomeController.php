<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    protected $request;
    private $repository;


    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function __construct(Request $request, User $user)
    {
        $this->middleware('auth');

        $this->request = $request;
        $this->repository = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index (User $user)
    // {
    //     return view('home');
    // }
    public function adminHome()
    {
        return view('admin');
    }

    public function search(Request $request) {
        $filters =         $request->except('_token');

        $users = $this->repository->search($request->filter);

        return view('users-list', [
            'users' => $users,
            'filters' => $filters
        ]);
    }
}