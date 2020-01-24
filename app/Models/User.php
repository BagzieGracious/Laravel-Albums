<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function setPasswordAttribute($password)
    {
        // set a user password automatically
        $this->attributes['password'] = Hash::make($password);
    }

     public function albums()
    {
        // user can add an album
        return $this->hasMany(Album::class);
    }

    public function comments()
    {
        // user can make many comments
        return $this->hasMany(Comment::class);
    }

    public function addAsset(Request $request)
    {
        // this function helps to add assets to an album
        $album = new Album([
            'title' => $request->title,
            'caption' => $request->caption,
            'images' => serialize($this->imageUpload($request))
        ]);
        return $this->albums()->save($album);
    }

    protected function imageUpload($request)
    {
        // this function helps user to upload images
        $date = now();
        $uploads = [];
        $manager = new ImageManager(array('driver' => 'imagick'));


        // loop through the images in the request
        foreach ($request->images as $image) {
            $filename = $image->getClientOriginalName();
            $extension = $image->extension();
            $path = implode('.', [$filename, $date->format('YmdHis'), $extension]);

            $data = $manager->make($image)
                            ->resize(320, 350)
                            ->save(public_path('/images/'. $path));
            array_push($uploads, 'images/'. $path);
        }

        return $uploads;
    }
}
