<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase, WithFaker;

    public function test_display_register_form()
    {
        // testing display of registration page
        $response = $this->get('/register/create');
        $response->assertStatus(200);
        $response->assertViewIs('registration.create');
    }


    public function test_register_user()
    {
        // testing user registration
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password(8);

        $response = $this->post('/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password
        ]);
        $response->assertRedirect('/albums');
        $this->assertDatabaseHas('users', ['name' => $name, 'email' => $email]);
    }


    public function test_wrong_registration_details()
    {
        // testing wrong data for registration
        $name = $this->faker->name;
        $password = $this->faker->password(8);

        $response = $this->post('/register', [
            'name' => $name,
            'email' => '',
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $errors = session('errors');
        $this->assertEquals(($errors->get('email'))[0], 'The email field is required.');
    }
}
