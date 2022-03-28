<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class GenerateController extends Controller
{
    public function index()
    {
        $generate = Post::latest()->get();
        return view('petugas.index', compact('generate'));
    }

}