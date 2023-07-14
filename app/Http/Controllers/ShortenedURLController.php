<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ShortenedUrlCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShortenedURLController extends Controller
{
    public function create(Request $request)
    {
        try {
            $originalUrl = $request->input('original_url');
            $expiresAt = Carbon::now()->addDays(7); // Set the expiration date to 7 days from now
            $shortenedUrl = ShortenedUrl::generateShortenedUrl($originalUrl);
            ShortenedUrl::create([
                'user_id' => auth()->id(),
                'original_url' => $originalUrl,
                'shortened_url' => $shortenedUrl,
                'expires_at' => $expiresAt,
            ]);
            return response()->json(['shortened_url' => $shortenedUrl]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ]);
        }
    }

    public function show(Request $request)
    {
        return view('shorthistory.main', [
            'data' => new ShortenedUrlCollection(ShortenedUrl::authenticatedUser()->orderBy('created_at', 'desc')->get())
        ]);
    }

    public function decodeShortUrls(Request $request)
    {
        try {
            $shortUrl = config('app.set_url_query') . $request->route('shortUrl');
            $record = ShortenedUrl::where('shortened_url', $shortUrl)->firstOrFail();
            return redirect($record->original_url);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
