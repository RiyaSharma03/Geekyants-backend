<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\SupportTicket;
use App\Models\Project;
use App\Models\Bonus;
use Illuminate\Http\Request;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");
class UserController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function supportTicket($user_id){
        $user = User::findOrFail($user_id);
        $supportTickets = $user->supportTickets;
        return response()->json($supportTickets);
    }
    public function userProject($user_id){
        $user = User::findOrFail($user_id);
        $project = $user->projects;
        return response()->json($project);
    }
    public function bonus($user_id){
        $user = User::find($user_id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }
    $bonuses = $user->bonus;
    return response()->json($bonuses);
    }

}
