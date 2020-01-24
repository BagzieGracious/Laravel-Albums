<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase, WithFaker;

    public function test_display_album_page()
    {
        // testing if the album page is displayed
        $response = $this->get('/albums');
        $response->assertStatus(200);
        $response->assertViewIs('albums.index');
    }

    public function test_display_create_album_page()
    {
        // testing if the album create page is displayed
        $user = $this->logged_in_user();
        $response = $this->actingAs($user)->get('/albums/create');
        $response->assertStatus(200);
        $response->assertViewIs('albums.create');
    }

    // public function test_display_single_album_page()
    // {
    //     // testing if a single album is displayed
    //     $user = $this->logged_in_user();
    //     $response = $this->actingAs($user)->get('/albums/1');
    //     // $response->assertStatus(200);
    //     dd($response);
    // }

    protected function logged_in_user()
    {
        // this function logs in a user
        $user = factory(User::class)->create();
        $this->post('/login', ['email' => $user->email, 'password' => 'password']);
        return $user;
    }
}
