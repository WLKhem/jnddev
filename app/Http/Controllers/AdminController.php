<?php

namespace App\Http\Controllers;

use App\Http\Resources\Admin\ShortenedUrlCollection;
use App\Http\Resources\Admin\UserCollection;
use App\Models\ShortenedUrl;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(Request $request)
    {
        return view('admin.main', [
            'users' => new UserCollection(
                User::withCount([
                    'shortenedUrls as total_shortened_urls',
                    'shortenedUrls as total_shortened_urls_expires'
                    => fn ($query) => $query->shortExpiresDate()
                ])->get()
            ),
            'shortenedLists' => new ShortenedUrlCollection(ShortenedUrl::with('user')->get()),
            'overviews' => [
                'user' => User::count(),
                'shortenedUrl' => ShortenedUrl::count(),
                'shortExpiresDate' => ShortenedUrl::shortExpiresDate()->count(),
            ]
        ]);
    }
}
