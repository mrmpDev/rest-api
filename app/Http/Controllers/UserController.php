<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
//        auth()->guard('api')->user();
//        dd(auth()->guard('api')->user());
        $users = User::all();
//        $users = UserResource::collection($users);
        $users = new UserResourceCollection($users);
        return $users;
    }


    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);
//        UserResource::wrap('fileds');
        $user = new UserResource($user);
        return $user;
    }


    public function store(CreateRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response($user, 201);
    }


    public function update(UpdateRequest $request, $userId)
    {
        $data = $request->only(['name', 'password']);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($userId);
        $user->update($data);
        return response($user, 202);
    }

    public function remove(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return response($user, 204);
    }
}
