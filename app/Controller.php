<?php

namespace RestlyFriendly;

class Controller
{

    protected function model($name)
    {

        static $instances = [];

        if (array_key_exists($name, $instances))
        {
            return $instances[$name];
        }

        $modelClass = '\RestlyFriendly\Models\\' . $name;

        if (!class_exists($modelClass))
        {
            throw new \Exception('Model class not found: ' . $modelClass);
        }

        $instances[$name] = new $modelClass;

        return $instances[$name];

    }

}
