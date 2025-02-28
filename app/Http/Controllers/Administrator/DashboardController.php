<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hour = now()->format('H');

        if ($hour >= 5 && $hour < 11) {
            $time = 'pagi';
        } elseif ($hour >= 11 && $hour < 15) {
            $time = 'siang';
        } elseif ($hour >= 15 && $hour < 18) {
            $time = 'sore';
        } else {
            $time = 'malam';
        }

        return view('administrator.pages.dashboard', compact('time'));
    }
}
