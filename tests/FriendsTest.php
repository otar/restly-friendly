<?php

use Phisby\PhisbyTestCase;

class FriendsTest extends PhisbyTestCase
{

    public function testGetFriends()
    {

        $this->phisby
            ->get(getenv('URL') . '/profiles/2/friends')
            ->expectStatus(200)
            ->expectHeaders([
                'Content-Type' => 'application/json'
            ])
            ->expectJSON('.', [
                'success' => TRUE
            ])
            ->expectJSONTypes('.', [
                'success' => 'boolean',
                'result' => 'array'
            ])
            ->expectJSONTypes('result[0]', [
                'id' => 'integer',
                'firstName' => 'string',
                'lastName' => 'string',
                'since' => 'integer'
            ])
            ->send();

    }

    public function testGetFriendsOfFriends()
    {

        $this->phisby
            ->get(getenv('URL') . '/profiles/2/friends-of-friends')
            ->expectStatus(200)
            ->expectHeaders([
                'Content-Type' => 'application/json'
            ])
            ->expectJSON('.', [
                'success' => TRUE
            ])
            ->expectJSONTypes('.', [
                'success' => 'boolean',
                'result' => 'array'
            ])
            ->expectJSONTypes('result', [
                'id' => 'integer',
                'firstName' => 'string',
                'lastName' => 'string',
                'friendsOfFriends' => 'array'
            ])
            ->expectJSONTypes('result[friendsOfFriends][0]', [
                'firstName' => 'string',
                'lastName' => 'string'
            ])
            ->send();

    }

}
