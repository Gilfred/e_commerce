<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(): JsonResponse{
        $user = User::all();
        return response()->json($user);
    }
}
