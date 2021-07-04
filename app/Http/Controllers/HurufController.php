<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HurufController extends Controller
{
    public function index()
    {
        $huruf=DB::table('huruf')->get();
        return response()->json($huruf);
    }
}
