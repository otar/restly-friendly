<?php

use Phisby\PhisbyTestCase;

class FriendRequestsTest extends PhisbyTestCase
{

    public function testGetFriendRequests()
    {

        $this->phisby
            ->get(getenv('URL') . '/profiles/1/friend-requests')
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
                'requesterId' => 'integer',
                'requestId' => 'integer',
                'firstName' => 'string',
                'lastName' => 'string',
                'status' => 'string',
                'createdAt' => 'integer',
            ])
            ->send();

    }

    public function testCreateFriendRequest()
    {

        $this->phisby
            ->post(
                getenv('URL') . '/profiles/1/friend-requests',
                [
                    'requester' => 3
                ]
            )
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
            ->expectJSON('result', [
                'created' => TRUE
            ])
            ->expectJSONTypes('result', [
                'created' => 'boolean'
            ])
            ->send();

    }

    public function testUpdateFriendRequest()
    {

        /*$this->phisby
            ->get(getenv('URL') . '/profiles')
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
                'lastName' => 'string'
            ])
            ->send();*/

    }

}
