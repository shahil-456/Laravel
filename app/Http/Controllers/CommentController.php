<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCommentRequest;
use App\Models\File;

use App\Http\Requests\CommentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Comment;



class CommentController extends Controller
{
    


    public function create(Request $request)
    {

        $comments = Comment::get();
        // $comments = Auth::user()->comments;


        return view('comment.add', [
            'user' => $request->user(),'comments'=>$comments
        ]);
    }




    public function store(Request $request)
    {
        
        Comment::create($request->all());

        return back()->with('success', 'Comment posted.');
    }
    
    


        public function destroy(string $id)
    {
        $customer = Comment::findOrFail($id);
        $customer->delete();

        return redirect()->route('comment.add')->with('success', 'Comment deleted successfully.');
    }


    public function show(Request $request ,$id)
    {

        $comment = Comment::find($id);

        // print_r($invoice);die;
        
        return view('comment.details', [
            'user' => $request->user(),'comment'=>$comment
        ]);




    }


    























   
}
