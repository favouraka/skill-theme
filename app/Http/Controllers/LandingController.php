<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class LandingController extends Controller
{
    public function index()
    {
        if (\Z3d0X\FilamentFabricator\Models\Page::whereTitle('Home')->exists()) {
            return redirect('home');
        }

        return view('home', [
            'homeUrl' => '/',
        ])->layout('layouts.app');
    }
}
