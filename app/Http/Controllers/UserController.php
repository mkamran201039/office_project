<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    

public function index2($id)
  {
    $user = User::find($id);
    
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }
    
    return response()->json($user, 200);
  }




    public function store(Request $request)
    {
         
            $data = $request->all();


            // Create a new User model instance and fill it with the extracted data
            $user = new User();
            $user->fill($data);

            // Save the user to the database
            $user->save();

            // Return a response indicating success
            return response()->json(['message' => 'User created successfully'], 201);
    }


    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Logic to update the user with the given ID
    }

    public function destroy($id)
    {
        // Logic to delete the user with the given ID
    }
}
