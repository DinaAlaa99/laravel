<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(){
        return redirect()->route('posts.show'); 
    }
}