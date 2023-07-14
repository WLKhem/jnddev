<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use AshAllenDesign\ShortURL\Classes\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShortenedUrl extends Model
{
    use HasFactory;

    protected $table = 'shortened_urls';

    protected $fillable = ['user_id', 'original_url', 'shortened_url', 'expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAuthenticatedUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function scopeShortExpiresDate($query)
    {
        return $query->where('expires_at', '<', now());
    }

    static function generateShortenedUrl($originalUrl)
    {
        $originalUrl = $originalUrl;
        $uniqueId = Str::random(6); // Generate a random string for unique identifier
        $encodedUrl = base64_encode($uniqueId); // Encode the unique identifier
        $shortenedUrl = config('app.set_url_query') . $encodedUrl;
        return $shortenedUrl;
    }
}
