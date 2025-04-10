<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
      
     public function showRegistrationForm()
     {
         return view('admin.signin'); // Show the custom register page
     }
 
     /**
      * Handle user registration.
      */
     public function register(Request $request)
     {
         // Validate the request data
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         // Create a new user
         User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         // Redirect to login page with success message
         return redirect()->route('admin.login')->with('success', 'Registration successful! Please log in.');
     }
}
