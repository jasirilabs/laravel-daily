<?php

namespace JasiriLabs\Daily;

use Illuminate\Support\Facades\Http;

class Daily
{
    public DailyClient $client  ;

    public function __construct()
    {
        $this->client = new DailyClient();
    }

    public function getDomainInfo(): string
    {
        $response = $this->client->get();

        return $response->body();
    }

    public function setDomainInfo(array $properties): string
    {
        $response = $this->client->post($properties);

        return $response->body();
    }

    /*
   |--------------------------------------------------------------------------
   | DAILY ROOMS API
   |--------------------------------------------------------------------------
   |
   | Manage rooms
   | https://docs.daily.co/reference/rest-api/rooms
   |
   */

    public function listRooms(string $param = null): array
    {
        $response = $this->client->get('rooms' . (isset($param) ? '?'.$param : ''));

         return json_decode($response->body(), true);
    }

    public function createRoom(string $name, bool $private, array $properties): array
    {
        $data = [
            'name' => $name,
            'privacy' => $private ? 'private' : 'public',
            'properties' => $properties
        ];

        $response = $this->client->post($data, 'rooms');

        return json_decode($response->body(), true);
    }

    public function showRoom(string $param): array
    {
        $response = $this->client->get('rooms' . '/' . $param);

        return json_decode($response->body(), true);
    }

    public function updateRoom(string $name, bool $private = null, array $properties = null): array
    {
        $data = [
            'privacy' => $private ? 'private' : 'public',
            'properties' => $properties
        ];

        $response = $this->client->post($data, 'rooms' . '/' . $name);

        return json_decode($response->body(), true);
    }

    public function deleteRoom(string $param): array
    {
        $response = $this->client->delete('rooms' . '/' . $param);

        return json_decode($response->body(), true);
    }
}
