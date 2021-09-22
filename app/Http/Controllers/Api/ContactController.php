<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class ContactController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
    }
}
