<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment =new ProjectComment();
        // $comment = new Comment();

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $movie = Project::find($request->project_id);

        $movie->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new ProjectComment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');
        // dd($reply->parent_id);

        $movie = Project::find($request->get('project_id'));

        $movie->comments()->save($reply);

        return back();

    }

    public function destroy($id)
    {
        $comment = ProjectComment::find($id);
        if ($comment) {
        // dd($comment);

            $comment->delete();
            return back();
        }
        else {
            return redirect()->route('404');

        }

    }
}
