<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{

    public function show(User $user)
    {

        return view('users.profile');
    }

    // show register/create form
    public function create()
    {
        return view('users.register');
    }

        // Create new user
        public function store(RegisterUserRequest $request)
        {
            
             //create user
             $user = User::create($request->FiltredAttributes());
             //login
             auth()->login($user);

             return redirect('/')->with('message', 'User created');
        }

        // logout User
        public function logout(Request $request)
        {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message','user loged out');
        }

        // show login form 
        public function login()
        {
            return view('users.login');
        }
                // athenticate user
        public function athenticate(LoginUserRequest $request)
        {

        if(auth()->attempt($request->FiltredAttributes())) {

            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in ');
        }

        return back()->withErrors(['email' =>'Invalid Credentials'])->onlyInput('email');
        
        }
                // update My Profile

        public function update(UpdateProfileRequest $request, User $user) {

                        # code...
                        $user->update($request->FiltredAttributes());
                        return back()->with('message',trans('profile updated successfully'));

                    
                        
                       return back()->with('message',trans('profile wasnt updated successfully'));
        
        }





        
}
