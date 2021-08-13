<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DryController extends Controller
{
    public function getDry(Request $request)
    {
        $dries = Dry::get();
        return response()->json($dries);
    }    
}
