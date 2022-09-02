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

class UserController extends Controller
{

    public function show(User $user)
    {
        //show single post
        $this->authorize('view', $user);


        return view('users.show',[
            'user' =>$user,

        ]);
    }

    // update USer

    public function update(UpdateUserRequest $request, User $user) {

        $this->authorize('update', auth()->user());

        if (password_verify($request->OldPassword, $user->password))  {

                 $user->update($request->FiltredAttributes());
            
           return back()->with('message',trans('User updated successfully'));

        }
        else {
            return back()->with('message',trans('something went wrong'));
        }


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

        public function ShowAdminForm(User $user)
        {
            $this->authorize('create', $user);
            return view('users.add_admin');
        }


        public function StoreAdmin(AddAdminRequest $request, User $user)
        {      
            
            $this->authorize('create', $user);

             //create user
             $user = User::create($request->filtredAttributes());

            //TO BE MOVED TO THE OBSERVER AFTER THE CREATION OF THE USER
             //$admin = Admin::create($validatedData1);
            
             return redirect('/')->with('message', 'Admin created');
        }

        public function manage()
        {

            //when() fl elqoulnt 

           return view('users.manage_users', [
            'users'=>(auth()->user()->role_id == 1) ? User::all() : User::where('role_id',3)->get()
           ] );


        }

            // delete USer

    public function destroy(User $user)
    {
        // make sure logged in user is the superAdmin

        $user->delete();

        return redirect('/')->with('message','user has been deleted successfully');
    }
        
}
