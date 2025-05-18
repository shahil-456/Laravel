<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogRequest;
use App\Models\File;

use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Blog;



class BlogController extends Controller
{
    


    public function index(Request $request)
    {

        $blogs = Blog::get();

        return view('blog.blogs', [
            'user' => $request->user(),'blogs'=>$blogs
        ]);
    }


    public function create(Request $request)
    {

        $blogs = Auth::user()->blogs;

        return view('blog.add', [
            'user' => $request->user(),'blogs'=>$blogs
        ]);
    }




    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
    
        $data['image'] = $request->file('image')->store('blogs', 'uploads');
    
        Blog::create($data);
    
        return redirect()->route('blog.add')->with('success', 'Blog added successfully!');
    }
    


    public function edit(string $id)
    {

        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog'));

    
    }


    public function update(StoreBlogRequest $request, $id)
    {
        
        $blog = Blog::findOrFail($id);
        $blog->update($request->validated());
    
        return redirect()->route('blog.edit', $id)->with('success', 'Blog updated successfully!');
    }
    



        public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog.add')->with('success', 'Blog deleted successfully.');
    }


    public function show(Request $request ,$id)
    {

        $blog = Blog::find($id);
        
        return view('blog.details', [
            'user' => $request->user(),'blog'=>$blog
        ]);


    }















   
}
