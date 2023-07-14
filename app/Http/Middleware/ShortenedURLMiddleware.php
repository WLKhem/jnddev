<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShortenedURLMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ]);
        }

        $validator = Validator::make($request->all(), ['original_url' => 'required|url']);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $errors) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ]);
            }
        }

        return $next($request);
    }
}
