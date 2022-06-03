<?php

use Illuminate\Support\Str;
use JasiriLabs\Daily\Facades\Daily;

test('can retrieve information about your domain.', function () {

    expect(Daily::getDomainInfo())->toBeJson();

});


test('can set domain configuration options.', function () {

    expect(Daily::setDomainInfo(
        ['properties' => [
            'lang' => 'en',
    ]]
    ))->toBeJson();

});


test('can returns a list of rooms in your domain.', function () {

    expect(Daily::listRooms())->toHaveKeys(['total_count', 'data']);

});


test('can  creates, retrieve and delete a room.', function () {

    $roomName = Str::random(10);

    $response = Daily::createRoom(
        name: $roomName,
        private: true,
        properties: [
            'lang' => 'en',
        ]
    );

    expect($response)->toHaveKeys(['id', 'name']);

    $this->assertTrue(Str::isUuid($response['id']));


    $response = Daily::showRoom($roomName);

    expect($response)->toHaveKeys(['id', 'name']);

    $this->assertTrue(Str::isUuid($response['id']));


    $response = Daily::updateRoom($roomName, private: false);

    expect($response)->toHaveKeys(['id', 'name']);

    $this->assertTrue(Str::isUuid($response['id']));


    $response = Daily::deleteRoom($roomName);

    expect($response)->toHaveKeys(['deleted', 'name']);

    $this->assertTrue($response['deleted']);



});

