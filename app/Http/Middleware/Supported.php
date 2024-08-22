<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class Supported
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
      $post = Post::where('senior_user_id',Auth::id())
      ->where('is_accepted', true)
      ->where('is_supported', false)
      ->with('supportUser')
      ->first();
      if (!$post){
        return redirect(route('home'));
      }
        return $next($request);
    }
}
