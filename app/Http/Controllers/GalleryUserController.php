<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryUserController extends Controller
{
    public function index()
    {
        return view('foto&video');
    }
}

