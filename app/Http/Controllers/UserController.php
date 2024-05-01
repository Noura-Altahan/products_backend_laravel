<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use App\Repository\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use \App\ReturnResult;

class UserController extends Controller
{
    public $user;
    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }
    public function register(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'type' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }
        $data = $request->all();
        $result->data = $this->user->registerUser($data);
        return response()->json($result);
    }

    public function loginUser(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }

        $data = $request->all();
        $result->data = $this->user->loginUser($data);
        return response()->json($result);
    }
    public function getUsersList(Request $request)
    {
        $result = new ReturnResult();
        $result->data = $this->user->getUsersList();
        return response()->json($result);
    }

    public function getUser(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }
        $data = $request->all();
        $result->data = $this->user->getUser($data);
        return response()->json($result);
    }

    public function updateUser(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }

        $data = $request->all();
        $result = new ReturnResult();
        $result->data = $this->user->updateUser($data);
        return response()->json($result);
    }
}
