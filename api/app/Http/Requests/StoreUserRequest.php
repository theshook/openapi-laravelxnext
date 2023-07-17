<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(schema="StoreUserRequest", required={"name","email","password"},
 *  @OA\Property(property="name", description="Name of the user", type="string", example="John Doe"),
 *  @OA\Property(property="email", description="Email of the user", type="string", format="email", example="example@example.com"),
 *  @OA\Property(property="password", description="Password of the user", type="string", example="password"),
 * )
 *
 */
class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }
}
