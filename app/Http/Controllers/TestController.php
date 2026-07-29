<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function showWelcomePage(){

        $name = "Emmanuel";


        // $name->first_name;

        $role = 'admin';
        return view('welcome', compact('role', 'name'));
    }

    public function home($string){
        return view('welcome', compact('string'));

    }

    public function doregister(AuthRequest $request){
        $request->validated();

        //Pa$$w0rd!
        dd($request->all());

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('registerSuccesful', 'You can now Login!');
    }

    public function dologin(Request $request){
        $authrequest = new AuthRequest;
        $validator = Validator::make(
            $request->only('email','password'),
            [
                'email' => 'required|string|email',
                'password' => 'required|min:9|max:20',
            ],
            $authrequest->messages()
        );

        if ($validator->fails()) {
            dd($validator->errors()->toArray());
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ;
        }

        Log::info('Validated Successful');

        // 1. Check if email exist
        $existingUser = User::where('email', $request->email)->first();
        // dd($existingUser);
        if(!$existingUser){
            Log::info("These Credentials Do Not Match Our Records!");
            return redirect()->back()->with('error', 'These Credentials Do Not Match Our Records!');
        }
        // 2. Password in database is the same as password on input
        $correctPassword = Hash::check($request->password, $existingUser->password);
        if($correctPassword ){
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            $request->session()->regenerate();
            return redirect('/cars');
        }else{
            Log::info('Password Is Not Correct!');
            return redirect()->back()->with('error', 'Password Is Not Correct!');
        }
    

    }
}




// public function dologin(Request $request)
// {
//     $credentials = $request->validate([
//         'email' => ['required', 'email'],
//         'password' => ['required'],
//     ]);

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate();

//         Log::info('Login successful', [
//             'user_id' => Auth::id()
//         ]);

//         return redirect('/cars');
//     }

//     Log::info('Invalid credentials');

//     return back()
//         ->withErrors([
//             'email' => 'The provided credentials do not match our records.',
//         ])
//         ->onlyInput('email');
// }