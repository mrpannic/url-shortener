<?php

namespace App\Services;

use Hashids\Hashids;
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
    }

    private function find(string $url) {
        return ShortUrl::where('original_url', $url)->first();
    }

    public function generateShortCode() {
        return Str::random(self::HASH_LENGTH);
    }
}
