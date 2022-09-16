<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\UpdateUserRequest;

class AdminController extends Controller
{
    //

    public function show(User $user)
    {
        //show single post
        $this->authorize('view', $user);


        return view('users.show',[
            'user' =>$user,

        ]);
    }

    
    public function edit(User $user)
    {
        //show single post
        $this->authorize('update', $user);


        return view('users.edit',[
            'user' =>$user,

        ]);
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
        
         return redirect('/')->with('message', 'Admin created');
    }

    public function manage()
    {

        //when() fl elqoulnt 

        $this->authorize('manage',auth()->user());


       return view('users.manage_users', [
        'users'=>(auth()->user()->role_id == 1) ? User::all() : User::where('role_id',3)->get()
       ] );


    }

    public function destroy(User $user)
    {
        // make sure logged in user is the superAdmin

        $this->authorize('delete');



        $user->delete();

        return redirect('/')->with('message','user has been deleted successfully');
    }

        // update USer

        public function update(UpdateUserRequest $request, User $user) {

            $this->authorize('update', auth()->user());
    
            $user->update($request->FiltredAttributes());
                
               return back()->with('message',trans('User updated successfully'));

        }

}
