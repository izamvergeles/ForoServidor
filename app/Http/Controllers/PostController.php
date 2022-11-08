<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Usuario;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use Carbon\Carbon;

class PostController extends Controller
{
    function __construct() {
        $this-> middleware('logged');        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $email = session()->get('email');
        $user = Usuario::where('correo', $email)->get();
        $mytime = Carbon::now()->subMinute(5);
        $mytime = $mytime->toDateTimeString();
        
        return view('post.index',['activePost' => 'active',
                                    'posts'    => $posts,
                                    'user'     => $user[0],
                                    'now'      => $mytime,
                                    'table'    => 'Post']);
                                   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', ['activePost' => 'active',
                                        'table' =>'Post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $email = session()->get('email');
        $user = Usuario::where('correo', $email)->get('id');
        $user =  $user[0]->id;
        $request['idusuario'] = $user;
        try{
        $post = new Post($request->all());
        $post->save();
        return redirect('/mypost');
        }catch(\Exeption $e){
            return back() -> withInput()->withErrors(['default' => 'Message ...']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $mypost)
    {
        $comments = Comment::all();
        $users = Usuario::all();
        return view('post.show', ['activePost' => 'active',
                                        'comments' => $comments,
                                        'users' => $users,
                                        'post' => $mypost]);
                                        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $mypost)
    {
        return view('post.edit', ['activePost' => 'active',
                                        'post' => $mypost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, Post $mypost)
    {
        $mytime = Carbon::now()->subMinute(5);
        $mytime = $mytime->toDateTimeString();
        if($mypost->updated_at > $mytime){
            try {
                $mypost->update($request->all());
                $message = 'The post has been updated.';
            } catch(Exception $e) {
                return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
            }
            return redirect('mypost')->with('message', $message);
        }else{
            return redirect('mypost')->with('message', 'You only have 5 minutes to edit your posts.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $mypost)
    {
        $mytime = Carbon::now()->subMinute(5);
        $mytime = $mytime->toDateTimeString();
        if($mycomment->updated_at > $mytime){
            try {
                $mypost->delete();
                $message = 'The post ' . $mypost->id . ' has been removed.';
            } catch(\Exception $e) {
                $message = 'The post ' . $mypost->id . ' has not been removed.';
            }
            return redirect('mypost')->with('message', $message);
        }else{
             return redirect('mypost')->with('message', 'You only have 5 minutes to delete your posts.');
        }
    }
    
    
    public function allposts()
    {
        $posts = Post::all();
        
        return view('post.all',['activePosts' => 'active',
                                    'posts'    => $posts,
                                    'table'    => 'Post']);
    }
    
}
