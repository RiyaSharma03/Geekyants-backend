<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SupportTicket;
use App\Models\Project;
use App\Models\Bonus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");
class UserController extends Controller
{
    public function loginUser(Request $request): Response
    {
        $user= User::where('email', $request->email)->first();
        // dd($request->email, $user)
            if (!$user) {
                return response([
                    'message' => ['Email do not match our records.'],
                    'success' => false
                ], 400);
            }
            if ($request->password!= $user->password) {
               
                return response([
                    'message' => ['Password do not match our records.'],
                    'success' => false
                ], 400);
            }
             $token = $user->createToken('my-app-token')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
                'csrf_token' => csrf_token(),
                'success' => true
            ];
             return response($response, 201);
    }
    public function googleLogin(Request $request)
    {
        $userData = $request->all(); // Retrieve the user details from the request payload
        // dd($userData);
        $user = User::where('email', $userData['email'])->first();

        if (!$user) {
            // Create a new user with default values
            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->birthday=null;
            $user->allocated_seat=null;
            $user->manager_id=null;
            $user->manager_name=null;
            $user->hr_buddy_id=null;
            $user->hr_buddy_name=null;
            // Set other default values as needed
            $user->save();
        }
        return response()->json(['success' => true]);
    }

    public function userDetails(): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            return Response(['data' => $user],200);
        }
        return Response(['data' => 'Unauthorized'],401);
    }
    public function logout(): Response
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
        
        return Response(['data' => 'User Logout successfully.'],200);
    }

    public function index($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function supportTicket($userId)
    {
        $user = User::findOrFail($userId);
        $supportTickets = $user->supportTickets;
        return response()->json($supportTickets);
    }
    public function userProject($userId)
    {
        $user = User::findOrFail($userId);
        $project = $user->projects;
        return response()->json($project);
    }
    public function bonus($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $bonuses = $user->bonus;
        return response()->json($bonuses);
    }

}