<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    public function insertData(){
        $post = new Post();
        $post->title ='';
        $post->body = '';
        $post->save();

        return "Inserted Succesfully";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('created_at','desc')->paginate(10);   
        return view('post.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    } 
    public function store(Request $req)
    {
        $this->validate($req, [
            'title'=>'required',
            'body'=>'required',
            'file' =>'image|nullable|max:1999'
        ]);
            if($req->hasFile('file')){
                $fileExt = $req->file('file')->getClientOriginalName();
                $fileName = pathinfo($fileExt,PATHINFO_FILENAME);
                $ext = $req->file('file')->getClientOriginalExtension();
                $fileStore = $fileName.'_'.time().'.'.$ext;
                $path = $req->file('file')->storeAs('public/cover_image', $fileStore);
            }else{
                $fileStore = "";
            }
        $post = new Post();
        $post->insert([ 
            'title'=>$req->title,
            'body'=>$req->body,
             'user_id'=>auth()->user()->id,
             'cover_image' =>$fileStore
            ]);

        return back()->with('post_added', 'post created successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'title'=>'required',
    //         'body'=>'required'
    //     ]);
        
    // }

   
    public function show($id)
    {

        $post = Post::find($id);
        return view('post.show')->with('post',$post);   
    }

   
    public function edit($id)
    {
        $post= Post::find($id);

        if(auth()->user()->id !== $post->user_id){
        return redirect('/post')->with('error','unauthorized page');         
        }
        return view('post.edit')->with('post',$post);
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        if($request->hasFile('file')){
            $fileExt = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileExt,PATHINFO_FILENAME);
            $ext = $request->file('file')->getClientOriginalExtension();
            $fileStore = $fileName.'_'.time().'.'.$ext;
            $path = $request->file('file')->storeAs('public/cover_image', $fileStore);
        }
      $post = Post::find($id);

      if($request->hasFile('file')){
        $post->update([
            'title'=>$request->title,
          'body'=>$request->body,
          'cover_image'=>$fileStore
          ]);
      }else{
          $post->update([
              'title'=>$request->title,
              'body'=>$request->body
              ]);
            }
        return back()->with('post_edited', 'postedited successfully');
    }

    
    public function destroy($id)
    {
            $post = Post::find($id);
                if(auth()->user()->id !== $post->user_id)
                {
                return redirect('/post')->with('error','unauthorized page');         
                }
                if($post->cover_image != ""){
                    Storage::delete('public/cover_image/'.$post->cover_image);
                }
            $post->delete();
            return redirect('/post')->with('success','successful');
    }
}
