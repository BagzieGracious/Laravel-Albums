<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Album;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = [];

    public function user()
    {
    	// many comments belong to a user
    	return $this->belongsTo(User::class);
    }

    public function album()
    {
    	// many comments belong to an album.
    	$this->belongsTo(Album::class);
    }

    protected function getCreatedAtAttribute($value)
    {
        // return Carbon::diffForHumans();
        $carbon = new Carbon($value);
        return $carbon->diffForHumans();
    }
}
