<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $newers =  Job::where('created_at' ,'>', Carbon::now()->subWeeks(4)->subDays(2))->count();
        $olders =  Job::where('created_at' ,'<', Carbon::now()->subWeeks(4)->subDays(2))->count();
        Job::where('created_at' ,'<', Carbon::now()->subWeeks(8)->subDays(4))->delete();
        $deleted = Job::onlyTrashed()->count();

        $jobs = Job::latest()->take(5)->paginate(5);
        return Inertia::render('Dashboard/Admin/Index',[
            'olders' => $olders ,
            'newers' => $newers,
            'deleted' => $deleted ,
            'jobs' => $jobs
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
