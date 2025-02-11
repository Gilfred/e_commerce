<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function accueil(): JsonResponse{
        return response()->json(['message'=>"test d'API!"]);
    }
}
