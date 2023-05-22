<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Http\Response;
use Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Validator;
use Illuminate\Support\Facades\Hash;


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");
class UserController extends Controller
{
    public function loginUser(Request $request): Response
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response([
                'message' => ['Email do not match our records.'],
                'success' => false
            ], 400);
        }
        if ($request->password != $user->password) {
            return response([
                'message' => ['Password do not match our records.'],
                'success' => false
            ], 400);
        }
        $payload = [
            'user_id' => $user->id,
            'email' => $user->email
        ];
        $algorithm = 'HS256';
        $secretKey = getenv('SECRET_KEY');
        $token = JWT::encode($payload, $secretKey, $algorithm);
        $authenticationToken = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'token' => $token,
            'success' => true,
            'authentication_token' => $authenticationToken
        ];
        return response($response, 201)->withCookie(new Cookie('access_token', $token, 0, '/', null, false, true));
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
            $user->birthday = null;
            $user->allocated_seat = null;
            $user->manager_id = null;
            $user->manager_name = null;
            $user->hr_buddy_id = null;
            $user->hr_buddy_name = null;
            // Set other default values as needed
            $user->save();
        }
        return response()->json(['success' => true]);
    }

    public function userDetails(): Response
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();
            $loggedInUserId = $loggedInUser->id;
            $requestedUserId = request()->route('id');
            if ($loggedInUserId == $requestedUserId) {
                return Response(['data' => $loggedInUser], 200);
            }
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    public function logout(): Response
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        $response = new Response();
        $response->headers->setCookie(
            Cookie::create('auth_token', '', 1, '/', null, false, true, false, 'none')
        );
        $response->headers->setCookie(
            Cookie::create('authentication_token', '', 1, '/', null, false, true, false, 'none')
        );
        return Response(['data' => 'User Logout successfully.'], 200);
    }
    public function index($id)
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();
            $loggedInUserId = $loggedInUser->id;
            if ($loggedInUserId == $id) {
                return response()->json($loggedInUser);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    public function supportTicket($userId)
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();
            $loggedInUserId = $loggedInUser->id;
            if ($loggedInUserId == $userId) {
                return response()->json($loggedInUser->supportTickets);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 401);

    }
    public function userProject($userId)
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();
            $loggedInUserId = $loggedInUser->id;
            if ($loggedInUserId == $userId) {
                return response()->json($loggedInUser->projects);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    public function bonus($userId)
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();
            $loggedInUserId = $loggedInUser->id;
            if ($loggedInUserId == $userId) {
                return response()->json($loggedInUser->bonus);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 401);
       
    }

}