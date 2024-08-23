<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')
        ->where('senior_user_id', Auth::user()->id)
        ->where('is_supported', false)
        ->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'distination_address' => 'required|string',
            'prefecture' => 'required|string',
            'city' => 'required|string',
            'current_location_address' => 'required|string',
            'meet_up_time' => 'required|date_format:Y-m-d\TH:i',
            'body_condition' => 'required|string',
            'person_number' => 'required|integer|min:1',
        ]);

        $post = new Post();
        $post->distination_address = $validatedData['distination_address'];
        $post->prefecture = $validatedData['prefecture'];
        $post->city = $validatedData['city'];
        $post->current_location_address = $validatedData['current_location_address'];
        $post->meet_up_time = $validatedData['meet_up_time'];
        $post->body_condition = $validatedData['body_condition'];
        $post->person_number = $validatedData['person_number'];
        $post->is_accepted = false;
        $post->senior_user_id = Auth::id();
        $post->save();

        return redirect()->route('post.index')->with('success', '投稿が作成されました');
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-posts', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        return redirect()->route('myposts')->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('myposts')->with('success', '投稿が削除されました');
    }

    public function approveIndex()
    {
        $posts = Post::where('is_accepted',false)->get();
        return view('support.approve', compact('posts'));
    }

    public function approve(Request $request)
    {
        $post=Post::find($request->id);
        $post->is_accepted = true;
        $post->save();
        
        $supportUser=Auth::guard('support')->user();
        $supportUser->post_id = $post->id;
        $supportUser->save();


        return redirect()->route('supporting')->with('success', '承諾しました。');
    }

    public function supporting()
    {
        $post = Auth::guard('support')->user()->post;
        return view('support.supporting', compact('post'));
    }

    public function supported(Request $request)
    {
        
        
        $supportUser=Auth::guard('support')->user();
        
        $post=$supportUser->post;
        $post->is_supported=true;
        $post->save();
        
        $supportUser->post_id = null;
        $supportUser->save();

        return redirect()->route('support.home')->with('success', '完了しました。');
    }
}

