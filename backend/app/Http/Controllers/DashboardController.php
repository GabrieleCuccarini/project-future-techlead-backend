<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfume;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $user = Auth::user();
        $perfumes = Perfume::all();

        return view('dashboard', compact(['user', 'perfumes']));
    }
}
