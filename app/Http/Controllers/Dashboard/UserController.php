<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Psy\Util\Str;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
      $user = Auth::user();
      $user['image'] = $user->image;
      $users = User::whereIs_admin(0)->get();
      return Inertia::render('Dashboard/Users/Index' , ['users' => $users , 'user' => $user]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return $id;
    }

    public function edit(User $user)
    {
        $editUser = Auth::user();
        $editUser['image'] = $editUser->image;
        return Inertia::render('Dashboard/Users/Edit',['user' => $user , 'editUser' => $editUser]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    public function acount()
    {
      $user = Auth::user();

        $user['image'] = $user->image;
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
      $user['image'] = $user->image;

      $users = User::paginate(10);
    
      return response()->json($users);
    }
}
