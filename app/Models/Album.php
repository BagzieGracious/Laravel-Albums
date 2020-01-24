<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
   protected $guarded = [];

   public function user()
   {
   		// many albums belong to a user
   		return $this->belongsTo(User::class);
   }

   public function comments()
   {
   		// many comments belong to a user
   		return $this->hasMany(Comment::class);
   }

   public function addComment($comment)
   {
   		// helps a user to add comments to an asset
   		$user_id = auth()->id();
   		return $this->comments()->create(compact('comment', 'user_id'));
   }
}
