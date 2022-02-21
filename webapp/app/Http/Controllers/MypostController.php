<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Image;

class MypostController extends Controller
{
   //     public function getHome()
    //{
    //    $posts = Post::all();
    //    return view('Home', ['posts'=>$posts]);
   // }
    public function index(Request $request)
    {
        $posts = Post::where('UserID', auth()->user()->UserID)->get();
       error_log ($posts);
        return view('mypost',['posts'=> $posts]);
    }
        
    
    public function create($id)
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }     
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'image' => 'image'
        ]);
        
        $posts = new Post();
        $posts->UserID = auth()->user()->UserID;
        $posts->Username = auth()->user()->Username;
        $posts->body = $request->body;
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('img/posts',$newName);
        $posts->image = $newName;
        $posts->save();
        
        // $test = $request->file('file')->guessExtension();

        // dd($test);

        // //return $request->file('file')->store('post-image');
        // $this->validate($request, [
        //     'body' => 'required',
        //     'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        // ]);

     

        // // $newfileName = time().'-'.$request->name . '.'.$request->image->extension();

        // // $request->image->move(public_path('img/posts'), $newfileName);
            
       
        // // $posts->file  = $newfileName;
        // // $posts->file = $newName;
        // $posts->save();
    
        return redirect('home');
    }   

    

    public function show(Post $posts)
    {
        return view('home', compact('post'));
    }
    // public function edit(Post $posts)
    // {
    //     return view('edit', compact('post'));
    // }
    // public function update(Request $request,Post $posts)
    // {
    //     $posts ->update($request->validated());

    //     return redirect()->route('home');
    // }

    
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('EditPost', ['posts'=> $posts]);
    }
    
    
    public function update(Request $request)
    {
        $posts = Post::where('id',$request->id)->first();
        $posts->body = $request->body;

        if(empty($request->file('image'))){
            $posts->image =  $posts->image;
        }else{
            unlink('img/posts/'.$posts->image);
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('img/posts', $newName);
            $posts->image = $newName;
        }
        $posts->save();
        return redirect('/home');
    
    }
    public function delete($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect('home')->with('success', 'Post Has been delete');
    }
    
    public function destroy(Post $posts)
    {
        $posts->delete();

        $response['status'] = "Success";
        $response['message'] = "Delete posts Successful";
        $response['data'] = $posts;
    
   
    return response()->json($response, 200);
    }
}