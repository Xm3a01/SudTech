<?php

namespace App\Http\Controllers;

use Swift;
use App\Mail\SendJob;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
        $mails = Visitor::all();

        try{
         foreach($mails as $mail){
          \Mail::to($mail)->send(new SendJob());
         }
        return "Done";
        } catch(\Exception $e) {
            return Str::limit($e->getMessage() , 47);
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
