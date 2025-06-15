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
            $page = FilamentFabricator::getPageWithBlocks('home');

            if (! $page) {
                abort(404);
            }

            $homeUrl = '/' . \Z3d0X\FilamentFabricator\Models\Page::whereTitle('Home')->first()->slug;

            return view('filament.pages.landing-page', [
                'page' => $page,
                'homeUrl' => $homeUrl,
            ]);
        }

        return view('home', [
            'homeUrl' => '/',
        ])->layout('layouts.app');
    }
}
