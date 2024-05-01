<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class UserRepository implements IUserRepository
{
    public function registerUser(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'type' => $data['type'],
            'is_active' => true,
        ]);
        return $user;
    }
    public function loginUser(array $data)
    {

        if (
            Auth::attempt([
                'name' => $data['name'],
                'password' => $data['password'],
                'is_active' => 1,
            ])
        ) {

            $user = User::where('id', Auth::user()->id)->first();
            //create token and store in db.
            $token = $user->createToken("mytoken")->plainTextToken;
            $result = ["name" => $user->name, "api_token" => $token];

            return $result;
        } else {
            // return error if user not exists.
            $result = 'Wrong Credentials';
            return $result;
        }
    }
    public function getUsersList()
    {
        // get all users list select only name , username ,type
        $usersList = User::select('name', 'username', 'type')->get();
        return $usersList;
    }
    public function getUser(array $data)
    {
        // get user 
        $user = User::where('id', $data['id'])->first();
        return $user;
    }
    public function updateUser(array $data)
    {
        // update user only (name,username,email)
        $user = User::where('id', $data['id'])->first();
        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->save();
        return $user;
    }
    public function deleteUser(int $id)
    {
        // delete user
        $user = User::where('id', $id)->first();
        $user->delete();
        return $user;
    }
}
