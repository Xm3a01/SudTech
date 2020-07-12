<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrashController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobs = $user->jobs()->onlyTrashed()->paginate(10);
        return Inertia::render('Dashboard/Job/Trash',['user' => $user , 'jobs' => $jobs]);
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $job =  Job::withTrashed()->where('id' , $id)->first();
       $job->created_at = Carbon::now();
       $job->updated_at = Carbon::now();
       $job->save();

       $job->restore();

        return back()->with('successMessage','job successfully Restored');
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function getTrashData()
    {
        $user = Auth::user();
        $jobs = $user->jobs()->onlyTrashed()->paginate(10);
        return response()->json($jobs);
        
    }
}
