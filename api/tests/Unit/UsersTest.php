<?php

use App\Http\Controllers\UsersController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

test('fetch all users', function () {
    $user = Mockery::mock(UsersController::class);
    $user->shouldReceive('index')->once()->andReturn('foo');

    $this->assertEquals('foo', $user->index());
});

test('fetch single user', function () {
    $instance = new User;
    $user = Mockery::mock(UsersController::class);
    $user->shouldReceive('show')->once()->andReturn($instance);

    $this->assertEquals($instance, $user->show(new User));
});

test('create a new user', function () {
    $user = Mockery::mock(UsersController::class);
    $user->shouldReceive('store')->once()->andReturn(new User);

    $this->assertEquals(new User, $user->store(new StoreUserRequest()));
});

test('update a new user', function () {
    $user = Mockery::mock(UsersController::class);
    $user->shouldReceive('update')->once()->andReturn('update');

    $this->assertEquals('update', $user->update(new UpdateUserRequest(), new User));
});

test('remove a new user', function () {
    $user = Mockery::mock(UsersController::class);
    $user->shouldReceive('destroy')->once()->andReturn('destroy');

    $this->assertEquals('destroy', $user->destroy(new User));
});
