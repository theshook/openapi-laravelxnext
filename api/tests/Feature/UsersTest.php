<?php

use App\Models\User;
use function Pest\Faker\fake;

$baseUrl = '/api/v1/users';

it('fetch all users', function ()  use ($baseUrl) {
    $response = $this->get($baseUrl);

    $response->assertStatus(200)->assertJsonStructure(
        [
            '*' => [
                'id',
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
            ],
        ]
    );
});

it('create a users', function () use ($baseUrl) {
    $name = fake()->name;
    $email = fake()->unique()->email;

    $this->post($baseUrl, [
        'name' => $name,
        'email' => $email,
        'password' => 'password',
    ])
        ->assertStatus(201)
        ->assertJsonStructure([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ])
        ->assertJson([
            'name' => $name,
            'email' => $email,
        ]);
});

it('fetch single users', function () use ($baseUrl) {
    $user = User::inRandomOrder()->first();

    $this->get("$baseUrl/$user->id")
        ->assertStatus(200)
        ->assertJsonStructure([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ])
        ->assertJson([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
});

it('updates a user', function ()use ($baseUrl) {
    $user = User::inRandomOrder()->first();
    $name = fake()->name;

    $this->put("$baseUrl/$user->id", [
        'name' => $name,
    ])
        ->assertStatus(200)
        ->assertJsonStructure([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ])
        ->assertJson([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $name,
        ]);
});

it('removes a user', function () use ($baseUrl) {
    $user = User::inRandomOrder()->first();

    $this->delete("$baseUrl/$user->id")
        ->assertStatus(204);
});
