<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Image;

class PostController extends Controller
{
  
    public function getHome(Request $request)
    {
        $posts = Post::orderby('created_at', 'desc')->get();
       error_log ($posts);
        return view('home',['posts'=> $posts]);
    }

    public function getNotif(Request $request)
    {
        $posts = Post::where('UserID', '!=' , auth()->user()->UserID)
                  ->whereDate('created_at', Carbon::today())
                  ->get();
        return view('home',['posts'=> $posts]);
    }

    public function likemanage(Request $request)
    {       
        ddd($request);
            // $data = new Post(); 
            // $posts = Post::findOrFail($id);
            // $posts->status = $request->status;
            // $posts->save();
            // return back();
    }
        
       // $request->user()->posts()->save($post);
    public function create($id)
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }     
    public function store(Request $request)
    {   
        // ddd($request);
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
        
        return redirect('home');
    }   
   

    

    public function show(Post $posts)
    {
        return view('home', compact('post'));
    }
   
//likes
public function likes($id)
{
    $existing_like = Like::withTrashed()->wherePostId($posts->id)->whereUserId(Auth::id())->first();

    if (is_null($existing_like)) {
        Like::create([
            'post_id' => $posts->id,
            'user_id' => Auth::id()
        ]);
    } else {
        if (is_null($existing_like->deleted_at)) {
            $existing_like->delete();
        } else {
            $existing_like->restore();
        }
    }
}
public function comment(Request $request, $post_id){    
    
    $posts = Post::where('id',$request->id)->get();
  
    $comment = Comment::where('post_id','like', $post_id)->paginate(3);

    return view('Comment', compact('posts','comment'));
}

public function addComment(Request $request)
{   
        $data = new Comment(); 
        $data->post_id = $request->post_id;
        $data->username = $request->username;
        $data->comment = $request->comment;
        $data->save();
        return back()->with(['success' => 'Comment succesfully add']);
    }

   

//REST API//
public function upload(Request $request){

    $this->validate($request, [
     
        'body' => 'required|max:1000',
        'image' => 'image:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if ($request->hasFile('image')) {

    //separate tags
        $posts = new Post();
        $posts->UserID = $request->UserID;
        $posts->Username = $request->Username;
        $posts->body = $request->body;
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('img/posts',$newName);
        $posts->image = $newName;

        $posts->save();

        $response['status'] = "Success";
        $response['message'] = "Add Posts Successful";
        $response['data'] = $posts;
    
   
    return response()->json($response, 200);
    
    }
    else{
        $response['status'] = "false";

        return response()->json($response, 500);
}
    
    return response()->json($response, 200);
    }

    public function getpost(){

        $posts = Tasks::all();
            $response['message'] = "Add Posts Successful";
            $response['data'] = $posts;            
        return response()->json($response, 200);
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