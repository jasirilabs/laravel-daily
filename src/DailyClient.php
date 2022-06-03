<?php

namespace JasiriLabs\Daily;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class DailyClient
{

    private string $apiKey;


    public function __construct()
    {
        $this->apiKey = config('laravel-daily.api_key');
    }

    public function get(string $endpoint = null): PromiseInterface|Response
    {

       return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->get(config('laravel-daily.base_url') . $endpoint);

    }

    public function post(array $data, string $endpoint = null): PromiseInterface|Response
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->post(config('laravel-daily.base_url') . $endpoint, $data);
    }

    public function delete(string $endpoint = null): PromiseInterface|Response
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->delete(config('laravel-daily.base_url') .  $endpoint);
    }

}