<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Post;

class PagesController extends Controller
{
    public function index(){
        
        $post = new Post();
        return view('pages.index')->with('post', $post);

    }

    public function about(){
        return view('pages.about');
    }

    public function services(){
        $data = array(
            'title'=>'Services',
             'Services' =>['We no too get services o', 'But e no good if we no write anything here', 'Vibes and Inshallah is how we move ']
        );
        return view('pages.services')->with($data);
    }
}
