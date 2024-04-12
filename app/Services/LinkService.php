<?php

namespace App\Services;

use App\Models\ShortUrl;

class LinkService
{
    public function getAll() {
        return ShortUrl::all();
    }

    public function find($shortCode) {
        return ShortUrl::where('short_code', $shortCode)->first();
    }
}
