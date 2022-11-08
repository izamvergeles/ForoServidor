<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Carbon\Carbon;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentEditRequest;

class CommentController extends Controller
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
        $comments = Comment::all();
        $email = session()->get('email');
        $user = Usuario::where('correo', $email)->get();
        $mytime = Carbon::now()->subMinute(5);
        $mytime = $mytime->toDateTimeString();
        
        return view('comment.index',['activeComment' => 'active',
                                    'comments'    => $comments,
                                    'user'     => $user[0],
                                    'now'      => $mytime,
                                    'table'    => 'Comment']);
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
    public function store(CommentCreateRequest $request)
    {
        $email = session()->get('email');
        $user = Usuario::where('correo', $email)->get('id');
        $user =  $user[0]->id;
        $request['idusuario'] = $user;
        try{
        $post = new Comment($request->all());
        $post->save();
        return redirect('/mypost/' . $request['idpost']);
        }catch(\Exeption $e){
            return back() -> withInput()->withErrors(['default' => 'Message ...']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $mycomment)
    {
        $post = Post::where('id', $mycomment->idpost)->get();
        $post = $post[0];
        $users = Usuario::all();
        return view('comment.show', ['activeComment' => 'active',
                                        'users' => $users,
                                        'post' => $post,
                                        'comment' => $mycomment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $mycomment)
    {
        return view('comment.edit', ['activeComment' => 'active',
                                        'comment' => $mycomment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentEditRequest $request, Comment $mycomment)
    {
        $mytime = Carbon::now()->subMinute(5);
        $mytime = $mytime->toDateTimeString();
        if($mycomment->updated_at > $mytime){
            try {
                $mycomment->update($request->all());
                $message = 'The comment has been updated.';
            } catch(Exception $e) {
                return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
            }
            return redirect('mycomment')->with('message', $message);
        }else{
            return redirect('mycomment')->with('message', 'You only have 5 minutes to edit your comments.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $mycomment)
    {
        $mytime = Carbon::now()->subMinute(5);
        $mytime = $mytime->toDateTimeString();
        if($mycomment->updated_at > $mytime){
            try {
                $mycomment->delete();
                $message = 'The comment ' . $mycomment->id . ' has been removed.';
            } catch(\Exception $e) {
                $message = 'The comment ' . $mycomment->id . ' has not been removed.';
            }
            return redirect('mycomment')->with('message', $message);
        }else{
             return redirect('mycomment')->with('message', 'You only have 5 minutes to delete your comments.');
        }
    }
}
