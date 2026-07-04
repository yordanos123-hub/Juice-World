<?php

namespaceJuice WorldApp\Http\Middleware;

useJuice WorldClosure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // ተጠቃሚው ካልገባ ወይም አድሚን ካልሆነ (is_admin == 0) ገጹን ይከለክላል
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'ይህ ገጽ ለአድሚን ብቻ የተፈቀደ ነው።');
        }

        return $next($request);
    }
}
