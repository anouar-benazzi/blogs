<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule as ValidationRule;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule as RuleRule;

class CommentController extends Controller
{
   
    public function index(post $post)
    {
       
        //show all comments
        return view('comments.index',[
            'comments' => Comment::with('post')->where('post_id',$post->id),
            'post' => $post
        ]);
    }
   
    
    
   /* public function store(CommentRequest $request) {

        $formFields = $request->validated();

        $formFields = $request->validate([
          
            'description' => 'required',
            'post_id' => 'required'
            
        ]);
           
           $formFields['user_id'] = auth()->id();

        Comment::create($formFields);

        return back()->with('message','post created successfully');

    }*/
}