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


    public function store2(Request $request)
    {
        $requestData = $request->all();
    
        if (empty($requestData['users']) || !is_array($requestData['users'])) {
            return response()->json(['message' => 'No user data provided'], 400);
        }
    
        foreach ($requestData['users'] as $userData) {
            // Create a new User model instance and fill it with the extracted data
            $user = new User();
            $user->fill($userData);
    
            // Save the user to the database
            $user->save();
        }
    
        // Return a response indicating success
        return response()->json(['message' => 'Users created successfully'], 201);
    }
    



    public function update(Request $request, $id)
    {
        // Step 1: Retrieve the user with the given ID from the database
        $user = User::find($id);
    
        // Step 2: Validate whether the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // Step 3: If the user exists, update its properties based on the data provided in the request
        $requestData = $request->all();
        $user->fill($requestData);
    
        // Step 4: Save the updated user to the database
        $user->save();
    
        // Step 5: Return a response indicating success
        return response()->json(['message' => 'User updated successfully'], 200);
    }
    

    public function destroy($id)
    {
        // Step 1: Find the user with the specified ID
        $user = User::find($id);
    
        // Step 2: Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // Step 3: If the user exists, delete it from the database
        $user->delete();
    
        // Step 4: Return a response indicating success
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
    
}
