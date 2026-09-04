<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class APICarsController extends Controller
{
    public function index(Request $request) {
        $search = $request->query('search');

        $cars = Cars::where('name', 'like', "%$search%")
        ->orWhere('model', 'like', "%$search%")
        ->orWhere('price', 'like', "%$search%")
        ->orWhere('colour', 'like', "%$search%")
        ->latest()->get();

        return response()->json($cars);
    }
}
