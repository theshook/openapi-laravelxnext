<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/users",
     *  operationId="fetchUsers",
     *  tags={"Users"},
     *  summary="Get list of Users",
     *  description="Get list of Users",
     *  @OA\Parameter(name="q", description="search between name and email of user", required=false, in="query", @OA\Schema(type="string")),
     *  @OA\Parameter(name="page", description="Page number", required=false, in="query", @OA\Schema(type="integer")),
     *  @OA\Parameter(name="limit", description="Number of items per page", required=false, in="query", @OA\Schema(type="integer")),
     *  @OA\Response(response=200, description="Successful operation",
     *      @OA\JsonContent(title="PaginatedUser",
     *          allOf={@OA\Schema(ref="#/components/schemas/Pagination")},
     *          @OA\Property(property="data", type="array", title="User",
     *              @OA\Items(
     *                  allOf={
     *                      @OA\Schema(ref="#/components/schemas/User"),
     *                      @OA\Schema(ref="#/components/schemas/CreatedAndUpdatedDates"),
     *                  }
     *              )
     *          ),
     *      ),
     *  ),
     *  @OA\Response(response=400, description="Bad request")
     * )
     *
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return User::when(request('q'), function ($query, $q) {
            $query->where('name', 'like', '%' . $q . '%')
                ->orWhere('email', 'like', '%' . $q . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(request('limit', 100));
    }

    /**
     * @OA\Post(
     *  path="/api/v1/users",
     *  operationId="createUser",
     *  tags={"Users"},
     *  summary="create a new Users",
     *  @OA\RequestBody(required=true, description="Pass user credentials",
     *      @OA\JsonContent(required={"name","email","password"}, ref="#/components/schemas/StoreUserRequest"),
     *  ),
     *  @OA\Response(response=200, description="Successful operation",
     *      @OA\JsonContent(title="CreatedUser",
     *          allOf={
     *              @OA\Schema(ref="#/components/schemas/User"),
     *              @OA\Schema(ref="#/components/schemas/CreatedAndUpdatedDates"),
     *          }
     *      ),
     *  ),
     *  @OA\Response(response=400, description="Bad request")
     * )
     *
     * Create and display the result resource.
     *
     */
    public function store(StoreUserRequest $request)
    {
        return User::create($request->validated());
    }

    /**
     * @OA\Put(
     *  path="/api/v1/users/{user}",
     *  @OA\Parameter(name="user", description="id of user", required=true, in="path", @OA\Schema(type="number")),
     *  operationId="updateUser",
     *  tags={"Users"},
     *  summary="update a Users",
     *  @OA\RequestBody(required=true, description="Pass user credentials",
     *      @OA\JsonContent(required={"name","email","password"}, ref="#/components/schemas/UpdateUserRequest"),
     *  ),
     *  @OA\Response(response=200, description="Successful operation",
     *      @OA\JsonContent(title="UpdatedUser",
     *          allOf={
     *              @OA\Schema(ref="#/components/schemas/User"),
     *              @OA\Schema(ref="#/components/schemas/CreatedAndUpdatedDates"),
     *          }
     *      ),
     *  ),
     *  @OA\Response(response=400, description="Bad request")
     * )
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return $user;
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/users/{user}",
     *  @OA\Parameter(name="user", description="id of user", required=true, in="path", @OA\Schema(type="number")),
     *  operationId="deleteUser",
     *  tags={"Users"},
     *  summary="delete Users",
     *  @OA\Response(response=204, description="Successful operation"),
     *  @OA\Response(response=400, description="Bad request")
     * )
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
