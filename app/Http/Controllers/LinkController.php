<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LinkService;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function __construct(private LinkService $linkService) {}

    public function index() {
        $links = $this->linkService->getAll();
        return response()->json(LinkResource::collection($links));
    }
}
