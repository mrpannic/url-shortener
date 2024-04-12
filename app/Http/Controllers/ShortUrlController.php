<?php

namespace App\Http\Controllers;

use App\Services\ShorteningService;
use App\Http\Requests\UrlCheckRequest;
use App\Http\Resources\ShortUrlResource;
use App\Services\SafeBrowsingAPIService;
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

    public function checkUrl(UrlCheckRequest $request) {
        $response = app(SafeBrowsingAPIService::class)->checkUrl($request->get('url'));
        return response()->json($response);
    }
}
