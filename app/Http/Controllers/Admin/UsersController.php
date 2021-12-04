<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users=User::all();
        //return view('admin.users.index')->withUsers($users);
        return view('admin.users.index')->with('users', User::paginate(5));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if (Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }
        $roles= Role::all();
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles'=>$roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->roles()->sync($request->roles);
        $user->name= $request->name;
        $user->email=$request->email;
        if ($user->save()){
            $request->session()->flash('success', $user->name .' has been Updated');
        }else{
            $request->session()->flash('error', 'There was an error updating the user');
        }


        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    //public function destroy(User $user)
    public function destroy($id)
    {
        //
        if (Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }

        if(Auth::user()->id==$id){
            return redirect()->route('admin.users.index')->with('warning', 'We can not delete your sefl');
        }
        /*
        $user->roles()->detach();
        $user->delete();
        */
        $user=User::find($id);
        if ($user){
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted');
        }
       // User::destroy($id);
        return redirect()->route('admin.users.index')->with('warning', 'This can not be deleted');


    }
}
