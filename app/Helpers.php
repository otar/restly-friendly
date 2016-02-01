<?php

namespace RestlyFriendly;

use Dflydev\DotAccessData\Data AS DotData;

class Helpers
{

    public static function config($path)
    {

        static $config;

        if ($config === NULL)
        {

            $configFile = __DIR__ . '/' . 'Config.php';

            if (!file_exists($configFile))
            {
                throw new \Exception('Configuration file not found, please create app/Config.php to continue.');
            }

            $config = new DotData(require $configFile);

        }

        return $config->get($path);

    }

}
