<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SupportingController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::where('senior_user_id',Auth::id())
        ->where('is_accepted', true)
        ->where('is_supported', false)
        ->with('supportUser')
        ->first();
        return view('supporting', compact('post'));
    }
}
