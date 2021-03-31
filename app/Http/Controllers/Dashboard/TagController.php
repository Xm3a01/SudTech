<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
   
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        $user = \Auth::user();
        $user['image'] = $user->image;
        return Inertia::render('Dashboard/Tags/Index' , ['tags' => $tags , 'user' => $user]);
    }

  
    public function create()
    {
        $user = \Auth::user();
        $user['image'] = $user->image;
        return Inertia::render('Dashboard/Tags/Create' , ['user' => $user]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required'
        ]);

        $tags = Tag::create($request->all());

        \Session::flash('successMessage' , 'Tag Save Successfully');
        return redirect()->route('tags.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(Tag $tag)
    {
        $user = \Auth::user();
        $user['image'] = $user->image;
        return Inertia::render('Dashboard/Tags/Edit' , ['user' => $user , 'tag' => $tag]);
    }

    
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request , [
            'name' => 'required'
        ]);

        $tag->update($request->all());

        \Session::flash('successMessage' , 'Tag update Successfully');
        return redirect()->route('tags.index');
    }

  
    public function destroy(Tag $tag)
    {
        $tag->delete();
        \Session::flash('successMessage' , 'Tag Delete Successfully');
        return redirect()->route('tags.index');
    }

    public function paginate()
    {
        $tags = Tag::latest()->paginate(10);
        return response()->json($tags);
    }
}
