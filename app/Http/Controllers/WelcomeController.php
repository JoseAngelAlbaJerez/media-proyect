<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;

class WelcomeController extends Controller
{
    public function index()
    {
        $videos = Multimedia::all()
        ->take(5)
        
        ;

        return view('welcome', compact('videos'));
    }
}
