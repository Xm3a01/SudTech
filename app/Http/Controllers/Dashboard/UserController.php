<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Psy\Util\Str;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Traits\AttachmentTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  use AttachmentTrait;
  
    public function index()
    {
      $user = Auth::user();
      $user['avatar'] = $user->avatar;
      $users = User::whereIs_admin(0)->get();
      return Inertia::render('Dashboard/Users/Index' , ['users' => $users , 'user' => $user]);
    }

    public function create()
    {
      $user = Auth::user();
      $user['avatar'] = $user->avatar;
      return Inertia::render('Dashboard/Users/Create' , ['user' => $user]);
    }

    public function store(Request $request)
    {
      $request['user_password'] = $request->password;
      $request['password'] = \Hash::make($request->password);
      $user = User::create($request->except('avatar'));

      if ($request->hasFile('avatar')) {
        // $user->clearMediaCollection('users');
        $this->singleFile($request->avatar , $user , 'users');
     }

     \Session::flash('success' , 'User create successfully');
      return redirect()->route('users.index');
    }

    public function show($id)
    {
        return $id;
    }

    public function edit(User $user)
    {
        $editUser = Auth::user();
        $editUser['avatar'] = $editUser->avatar;
        return Inertia::render('Dashboard/Users/Edit',['user' => $user , 'editUser' => $editUser]);
    }

    public function update(Request $request, User $user)
    {
      if($request->has('password')) {
        $request['user_password'] = $request->password;
        $request['password'] = \Hash::make($request->password);
      }
      $user->update($request->except('avatar'));

      if ($request->hasFile('avatar')) {
        $user->clearMediaCollection('users');
        $this->singleFile($request->avatar , $user , 'users');
    }

    \Session::flash('success' , 'User update successfully');
    return redirect()->route('users.index');
  }

    public function destroy(User $user)
    {
        if($user->avatar) {
          $user->clearMediaCollection('users');
        }

        $user->delete();

        \Session::flash('success' , 'User delete successfully');
         return redirect()->route('users.index');
    }


    public function acount()
    {
      $user = Auth::user();

        $user['avatar'] = $user->avatar;
        return Inertia::render('Dashboard/Setting/Edit',['user' => $user]);
    }

    public function editUser(Request $request , $id)
    {
        // return $request->avatar->getClientOriginalName();
        $user = User::findOrFail($id);
          if($request->name){
            $user->name = $request->name;
          }
          if($request->email){
            $user->email = $request->email;
          }
          if($request->password){
            $user->password = \Hash::make($request->password);
            $user->user_password = $request->password;
          }
          $user->save();
          if ($request->has('avatar')) {
            $user->clearMediaCollection('users');
            $user->addMedia($request->avatar)->preservingOriginal()->toMediaCollection('users');
        }

          return back()->with('successMessage' , 'Account updated');
    }

    public function paginate(Request $request)
    {
      $user = Auth::user();
      $user['avatar'] = $user->avatar;

      $users = User::paginate(10);
    
      return response()->json($users);
    }
}
