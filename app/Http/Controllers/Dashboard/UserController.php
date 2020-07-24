<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        //
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

    public function edit($id)
    {
        $user = Auth::user();
        return Inertia::render('Dashboard/Setting/Edit',['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function editUser(Request $request , $id)
    {
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

          return back()->with('successMessage' , 'Account updated');
    }
}
