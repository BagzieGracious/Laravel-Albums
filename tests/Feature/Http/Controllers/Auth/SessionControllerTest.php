<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Auth;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SessionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase, WithFaker;

    public function test_display_login_page()
    {
        // testing if the login page is displayed
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('sessions.create');
    }

    public function test_authenticated_user_accessing_login_page()
    {
        // redirect user to albums route
        $user = $this->logged_in_user();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/albums');
    }

    public function test_login_validation_errors()
    {
        // testing if vaidation errors are returned
        $response = $this->post('/login', []);
        $errors = session('errors');
        $this->assertEquals(($errors->get('email'))[0], 'The email field is required.');
        $this->assertEquals(($errors->get('password'))[0], 'The password field is required.');
    }

    public function test_login_user()
    {
        // testing user login
        $user = $this->logged_in_user();
        $this->assertAuthenticatedAs($user);
        $response = $this->post('/login', ['email' => $user->email, 'password' => 'password']);
        $response->assertRedirect('/albums');
    }

    public function test_display_profile_page()
    {
        // authenticated user viewing a profile page
        $user = $this->logged_in_user();
        $response = $this->actingAs($user)->get('/users/profile');
        $response->assertViewIs('sessions.show');
    }

    public function test_unauthenticated_user_accessing_profile_page()
    {
        // unauthenticated user viewing a profile page
        $response = $this->get('/users/profile');
        $response->assertSessionHasErrors('messages');
    }

    public function test_update_user_information()
    {
        // testing if user can update their information
        $user = $this->logged_in_user();
        $this->actingAs($user)->patch('/users/profile', [
            'email' => 'tryemail@gmail.com', 'name' => 'Bagzie', 'contact' => '0780500600'
        ]);
        $this->assertDatabaseHas('users', ['name' => 'Bagzie', 'contact' => '0780500600']);
    }

    public function test_user_logout()
    {
        // testing if user can logout
        $response = $this->get('/logout');
        $response->assertRedirect('/albums');
    }

    protected function logged_in_user()
    {
        // this function logs in a user
        $user = factory(User::class)->create();
        $this->post('/login', ['email' => $user->email, 'password' => 'password']);
        return $user;
    }
}
