<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\User\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return response()->json(['welcome'], 200);
    }

    public function user()
    {
        try {
            $users = Customer::get();
            return response()->json(['message' => 'User List', 'users' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving users', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $users = Customer::findOrFail($id);
            return response()->json(['message' => 'User show', 'users' => $users], 200);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving users', 'error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $users = Customer::findOrFail($id);
            return response()->json(['message' => 'User edit', 'users' => $users], 200);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving users', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $data = $request->all();
            $users = Customer::findOrFail($id);
            $validation = Validator::make($data, [
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required'
            ]);
            
            if ($validation->fails()) {
                return response()->json(['error' => $validation->errors()], 422);
            }
            $users->update($data);
            return response()->json(['message' => 'User update successfully'], 200);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving users', 'error' => $e->getMessage()], 500);
        }
    }
}
