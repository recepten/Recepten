<?php

namespace App\Http\Middleware;

use Closure;

class UserHasNotUpvotedYet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->id;

        if (\Auth::user()->hasUpvoted($id)) {
            return redirect('recept/' . $id);
        }

        return $next($request);
    }
}
