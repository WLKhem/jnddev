<?php

namespace App\Http\Middleware;

use App\Models\ShortenedUrl;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CheckDecodeShortUrlMiddleware
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
        $validator = Validator::make(
            ['shortUrl' => $request->shortUrl],
            [
                'shortUrl'  => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $query = ShortenedUrl::where('expires_at', '>', now());
                        $query->where('shortened_url', config('app.set_url_query') . $value);
                        $query = $query->first();
                        if (!$query) {
                            $fail($attribute . ' is invalid.');
                        }
                    },
                ]
            ]
        );

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return abort(404, $errorMessage);
        }

        return $next($request);
    }
}
