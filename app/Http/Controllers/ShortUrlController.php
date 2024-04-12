<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShorteningService;
use App\Http\Resources\ShortUrlResource;
use App\Http\Requests\ShortUrlStoreRequest;

class ShortUrlController extends Controller
{
    public function __construct(private ShorteningService $shorteningService) {}

    public function shorten(ShortUrlStoreRequest $request) {
        $shortUrl = $this->shorteningService->shorten($request->url);
        return response()->json(new ShortUrlResource($shortUrl));
    }

    public function redirect($shortCode) {
        return $this->shorteningService->redirect($shortCode);
    }
}
