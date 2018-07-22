<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfEmailNotConfirmed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
 * @return mixedapp
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user()->confirmed) {
            return redirect('/books')
                ->with('flash', 'You must first confirm your email address.');
        }
        return $next($request);
    }
} 
