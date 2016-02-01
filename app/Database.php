<?php

namespace RestlyFriendly;

use Neoxygen\NeoClient\ClientBuilder;
use RestlyFriendly\Helpers;

class Database
{

    public function client()
    {

        static $client;

        if ($client === NULL)
        {

            $config = Helpers::config('database');

            $client = ClientBuilder::create()
                ->addConnection(
                    'default',
                    'http',
                    $config['hostname'],
                    $config['port'],
                    TRUE,
                    $config['username'],
                    $config['password']
                )
                ->setAutoFormatResponse(TRUE)
                ->build();

        }

        return $client;

    }

    public function query($statement, array $parameters = [])
    {

        return $this->client()->sendCypherQuery($statement, $parameters);

    }

    public function multiQuery(array $statements)
    {

        $prepared = $this->client()->prepareTransaction();

        foreach ($statements AS $statement)
        {

            $prepared->pushQuery(
                $statement['statement'],
                $statement['parameters']
            );

        }

        return $prepared->commit()->getResult();

    }

}
