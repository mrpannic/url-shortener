<?php

namespace App\Services;

class SafeBrowsingAPIService
{
    private $apiKey;
    private $endpoint;

    public function __construct() {
        $this->apiKey = env('GOOGLE_SAFE_BROWSING_API_KEY');
        $this->endpoint = env('GOOGLE_SAFE_BROWSING_API_ENDPOINT');
    }

    private function getBody($urls = []) {
        if (!is_array($urls)) {
            $urls = collect([$urls]);
        }

        $urls = $urls->map(function($url) {
            return ['url' => $url];
        });

        $data = [
            'client' => [
                'clientId' => 'laravel-testing-safe-browsing',
                'clientVersion' => '0.0.1'
            ],
            'threatInfo' => [
                'threatTypes' => ['MALWARE', 'SOCIAL_ENGINEERING', 'UNWANTED_SOFTWARE', 'POTENTIALLY_HARMFUL_APPLICATION'],
                'platformTypes' => ['ANY_PLATFORM'],
                'threatEntryTypes' => ['URL'],
                'threatEntries' => $urls->toArray()
            ]
        ];

        return $data;
    }

    public function checkUrl($urls) {
        $client = new \GuzzleHttp\Client();
        $body = $this->getBody($urls);
        $response = $client->post("{$this->endpoint}?key={$this->apiKey}", [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($body)
        ]);
        $decoded = json_decode($response->getBody()->getContents(), true);

        return $decoded;
    }
}
