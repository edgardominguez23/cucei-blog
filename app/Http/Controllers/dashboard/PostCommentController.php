<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol.admin');
    }

    public function index()
    {
        $postComments = PostComment::orderBy('created_at','desc')->paginate(4);

        return view("dashboard.post-comment.index",['postComments'=> $postComments]);
    }

    public function post(Post $post)
    {
        $postComments = PostComment::orderBy('created_at','desc')->where('post_id','=',$post->id)->paginate(4);

        return view("dashboard.post-comment.index",['postComments'=> $postComments]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostComment $postComment)
    {
        //$postComment = PostComment::findOrFail($id);

        return view("dashboard.post-comment.show",["postComment"=>$postComment]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostComment $postComment)
    {
        $postComment->delete();
        return back()->with('status','Comment deleted successfully');
    }
}
