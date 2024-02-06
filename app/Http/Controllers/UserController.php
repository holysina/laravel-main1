<?php

namespace App\Http\Controllers;

use App\Models\listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('user', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $formFields['password'] = password_hash($formFields['password'], PASSWORD_DEFAULT);

        $user = user::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'user created');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Auth.register');
    }

    public function login()
    {
        return view('Auth.login');
    }

    /**
     * logout
     */
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with('message', 'you logout now :)');
    }

    public function CheckLogin(Request $request)

    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'welcome back');
        }
        return back()->withErrors(['email' => 'invalid value'])->onlyInput('email');
    }

    /**
     *mange current user posts
     */
    public function mange()
    {
        $id = auth()->user()->id;
        return view('listings.mange', ['listings' => listing::mange($id)]);

    }

}
