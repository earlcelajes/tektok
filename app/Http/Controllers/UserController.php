<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Events\UserCreated;

class UserController extends Controller
{
    // /user

    /**
     * Display a listing of the resource.
     * /user
     */
    public function index(Request $request)
    {
        $users = User::all();

        return response($users);
    }

    /**
     * Store a newly created resource in storage.
     * POST /user
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        UserCreated::dispatch($user);

        return response($user);
    }

    /**
     * Display the specified resource.
     * GET /user/{id}
     */
    public function show(Request $request, User $user)
    {
        return response($user);
    }

    /**
     * Update the specified resource in storage.
     * POST /user/{id}
     * _method = PUT
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response($user);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * POST /user/{id}
     * _method = DELETE
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        
        return response('OK');
    }
}
