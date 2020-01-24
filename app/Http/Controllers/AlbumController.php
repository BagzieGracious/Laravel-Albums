<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    
    public function __construct()
    {
        // protect all methods expect index method
    	$this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        // return all assets
        $assets = Album::latest()->paginate(3);
    	return view('albums.index', compact('assets'));
    }

    public function show($asset)
    {
        // return single asset
        $asset = Album::find($asset);
        // $comments = Comment::where('album_id', $asset->id)->latest()->paginate(3);
        return view('albums.show', compact('asset'));
    }

    public function create()
    {
        // return a create page
    	return view('albums.create');
    }

    public function store(AlbumRequest $request)
    {
        // to do check if someone is logged in
        if(!auth()->check()){
            return errors('You have to be logged in first.');
        }

        // store assets in the album
        $asset = auth()->user()->addAsset($request);

    	if(!$asset){
    		return errors('Oops, something went wrong. Please try again.');
    	}

        flash('You have added an asset successfully.');
    	return redirect('/albums');
    }

    public function destroy(Album $album)
    {
        // delete an asset from the album
        $asset = $album->delete();
        foreach (unserialize($album->images) as $image)
        {
            Storage::delete($image);
        }
        
        if(!$asset){
            return errors('Oops! something went wrong, please try again.');
        }

        flash('You have deleted an asset successfully.');
        return redirect('/albums');
    }
}
