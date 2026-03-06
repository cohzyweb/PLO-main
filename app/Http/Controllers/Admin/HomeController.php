<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the admin's home page.
     */
    public function show(Request $request): View
    {
        return view('admin.home');
    }
}
