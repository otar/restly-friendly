<?php

namespace RestlyFriendly\Controllers;

use RestlyFriendly\Controller;
use RestlyFriendly\Response;
use Symfony\Component\HttpFoundation\Request;

class FriendRequests extends Controller
{

    public function getFriendRequests(Request $request, array $parameters)
    {

        $result = $this->model('FriendRequests')->getFriendRequests($parameters['id']);

        return new Response(TRUE, $result);

    }

    public function createFriendRequest(Request $request, array $parameters)
    {

        return new Response(TRUE, [

        ]);

    }

    public function updateFriendRequest(Request $request, array $parameters)
    {

        return new Response(TRUE, [

        ]);

    }

}
