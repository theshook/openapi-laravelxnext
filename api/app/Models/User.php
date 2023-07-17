<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *  schema="User",
 *  description="User model",
 *  @OA\Property(property="id", description="ID of the user", format="int64", example=1),
 *  @OA\Property(property="name", description="Name of the user", example="John Doe"),
 *  @OA\Property(property="email", description="Email of the user", format="email", example="example@example.com"),
 *  @OA\Property(property="email_verified_at", description="Email verification", format="date", example="2023-01-01 09:32:29"),
 *  @OA\Property(property="password", description="Password of the user", example="password"),
 * )
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
