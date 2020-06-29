<?php

namespace App\Http\Controllers\Dashboard;

use App\Visitor;
use App\Mail\SendJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
        $mails = Visitor::all();
      try{
        \Mail::to($mails)->send(new SendJob());
        return "Done";
        } catch(Exception $e) {
            return $e->getMessage();
        }
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
