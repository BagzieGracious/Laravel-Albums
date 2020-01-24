<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(Album $album)
    {
        $comments = Comment::where('album_id', $album->id)->with('user')->latest()->get();
        if(is_null($comments))
            return response('No comments found', 404);
        return response($comments, 200);
    }

    public function store(Album $album)
    {
        // post a comment
    	$album->addComment(request('comment'));
    	if(!$album){
    		return response('Oops! something went wrong, please try again.', 400);
    	}

    	// flash('You have added your commented successfully.');        
    	return $this->index($album);
    }


    public function destroy(Album $album, Comment $comment)
    {
        // delete comment of a user
        $comment = $comment->delete();
        if(!$comment){
            return response('Oops! Something went wrong, please try again.', 400);
        }

        // flash('You have deleted your commented successfully.');
    	return response('You have deleted a comment successfully', 200);
    }

}
