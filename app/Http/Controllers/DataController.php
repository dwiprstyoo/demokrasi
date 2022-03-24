<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use PDF;

use App\Data;
class DataController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return view ('posts/pdf',compact('data'));
    }
    public function exportPDF() {
       
        $data = Post::all();
  
        $pdf = PDF::loadView('posts.pdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        
        return $pdf->download('pendaftaran.pdf');
        
      }
}