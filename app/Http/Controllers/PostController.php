<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule as ValidationRule;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule as RuleRule;

class PostController extends Controller
{
     public function index()
    {



        //show all posts
        return view('Posts.index',[
            'posts' => Post::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }

    public function show(Post $post)
    {
        //show single post
        $this->authorize('view', $post);


        return view('posts.show',[
            'post' =>$post,

        ]);
    }

            //show create form

     public function create() {
        return view('posts.create');
     }

     
      //store post data

      public function store(PostRequest $request) {
        
        Post::create($request->FiltredAttributes());

        return Redirect('/')->with('message','post created successfully');

    }

    // show edit form
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit',['post' => $post]);
    }

    public function update(PostRequest $request, Post $post) {

        // make sure logged in user is oweer
        $this->authorize('update', [$post, auth()->user()]);

        $post->update($request->FiltredAttributes());
            
        return back()->with('message',trans('post updated successfully'));

    }

    // delete post

    public function destroy(Post $post)
    {
        // make sure logged in user is oweer
        $this->authorize('delete', [$post,auth()]);

        $post->delete();

        return redirect('/')->with('message','post deleted successfully');
    }

    // manage post
    public function manage()
    {
        
       return view('posts.manage',['posts' => (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) ? Post::all() : auth()->user()->Post()->get()]); 

    }

    public function addcomment(post $post, CommentRequest $request)
    {
        
        Comment::create($request->FiltredAttributes($post));

        return back()->with('message','comment created successfully');
    }


}
