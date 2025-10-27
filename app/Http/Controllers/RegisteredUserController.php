<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'], // Look in the users table and see if there is any email field with this email if so we cannot create a new user with the same email
            'password' => ['required', 'confirmed',Password::min(6)],
        ]);

        $employerAttributes = $request->validate([
            'employer' => ['required'],
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg' ,'webp'])],
        ]);

        // Create employer as a user
        $user = User::create($userAttributes);
        // Store the logo of the employer
       $logoPath =  $request->logo->store('logos'); // Returns path to where the logo is save or uploaded

        // User the user details to create the employer
        // The user_id is automatically passed to the create method when we invoke the employer relationship on the user model
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath,
        ]);


       // Login the User(Employer)
       Auth::login($user);

       // Redirect to the home page

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
        //
    }
}
