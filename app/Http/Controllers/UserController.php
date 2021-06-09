<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getUserById($id)
    {
        $user = User::find($id);
        return response()->json(compact('user'), 200);
    }
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json(compact('users'), 200);
    }
    public function createUser(Request $request)
    {
        $input = $request->all();

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();
        return response()->json(compact('user'), 200);
    }
    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        $input = $request->all();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();
        return response()->json(compact('user'), 200);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        $status = "delete succes";
        return response()->json(compact('status'), 200);
    
    }

}
