<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ShortenedUrl;
use Illuminate\Database\Seeder;

class ShortenedUrlsTableSeeder extends Seeder
{
    public function run()
    {
        $originalUrl = "https://dashboard.heroku.com/apps/wlkhem888";
        $expiresAt = Carbon::now()->addDays(7); // Set the expiration date to 7 days from now
        ShortenedUrl::create([
            'user_id' => 1,
            'original_url' => $originalUrl,
            'shortened_url' => ShortenedUrl::generateShortenedUrl($originalUrl),
            'expires_at' => $expiresAt,
        ]);
        // ShortenedUrl::truncate();
    }
}
