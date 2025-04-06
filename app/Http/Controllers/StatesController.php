<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\State;

class StatesController extends Controller
{
    //  Metodo para retornar todos os states 
    public function index(Request $r):JsonResponse
    {   
        //  Pegando todos os states
        $states = State::all();
        //  Retornando todos os states
        return response()->json(['data' => $states]);
    }
}
