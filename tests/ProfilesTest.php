<?php

use Phisby\PhisbyTestCase;

class ProfilesTest extends PhisbyTestCase
{

    public function testGetAllProfiles()
    {

        $this->phisby
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
            ->send();

    }

    public function testGetProfile()
    {

        $this->phisby
            ->get(getenv('URL') . '/profiles/1')
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
                'lastName' => 'string'
            ])
            ->send();

    }

}
