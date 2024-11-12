<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Samplecontroller extends Controller
{
    // 
    public function index() {
        $name = 'Goto';

        return view('new-page', compact('name'));
    }

}