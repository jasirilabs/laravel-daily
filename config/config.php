<?php

/*
 * You can place your custom package configuration in here.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | DAILY API KEY
    |--------------------------------------------------------------------------
    |
    | To obtain an API key, go to check out
    | https://docs.daily.co/guides/create-and-manage-rooms-with-the-rest-api#your-api-key
    |
    */

    'api_key' => env('DAILY_API_KEY', '803653e752673a8a482db0dc6b688e7ae0b6837cf073a5e80392f4824339fc5e'),

    /*
     * The base url of the Daily API.
     *
     */

    'base_url' => 'https://api.daily.co/v1/',
];