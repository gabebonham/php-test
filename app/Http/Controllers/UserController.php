<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Services\UsersService;

class UserController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }
    public function logout(){
        $this->usersService->logout();
        return view('home');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if ($this->usersService->login($credentials['email'], $credentials['password'], $request)) {
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function create(Request $request){
        $this->usersService->create($request->name,$request->email, $request->password);
        return view('home');
    }
    public function getAll(){
        return $this->usersService->getAll();
    }
    public function getById($id){
        return $this->usersService->getById($id);
    }
}
