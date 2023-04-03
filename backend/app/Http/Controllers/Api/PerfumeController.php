<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;


class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //RIPORTA NEL FRONT SOLO I PROFUMI ATTIVI
        $perfumes = Perfume::where('show', '=', 1)->get();
        return response()->json($perfumes);
    }
}