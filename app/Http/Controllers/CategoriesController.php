<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    //
    public function index():JsonResponse
    {
        // Pegando todas as categories
        $categories = Category::all();
        //  Retornando todas as categories
        return response()->json(['data' => $categories]);
    }
}
