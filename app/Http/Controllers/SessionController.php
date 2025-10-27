<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // attempt to login
        if(! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages(
                [
                'email' => 'Sorry the credentials do not match',
                'password' => 'Password Does not match'

                ]
                );
        };

        // regenerate the session token after loggin in
        request()->session()->regenerate();

        //redirect

        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Auth::logout();
       return redirect('/');
    }
}
