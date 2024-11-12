<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerdetailController extends Controller
{
    public function create() {
        return view('entry.show');
    }
}
