<?php

namespace App\Services;

use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShorteningService
{
    const HASH_LENGTH = 6;

    public function shorten(string $url) {
        $shortUrl = $this->find($url);
        if ($shortUrl) return $shortUrl;

        $shortUrl = ShortUrl::create([
            'original_url' => $url,
            'short_code' => $this->generateShortCode()
        ]);
        return $shortUrl;
    }

    private function find(string $url) {
        return ShortUrl::where('original_url', $url)->first();
    }

    public function generateShortCode() {
        return Str::random(self::HASH_LENGTH);
    }

    public function redirect($shortCode) {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->first();
        if (!$shortUrl) {
            abort(404);
        }

        return redirect($shortUrl->original_url);
    }
}
