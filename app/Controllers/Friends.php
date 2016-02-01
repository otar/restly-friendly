<?php

namespace RestlyFriendly\Controllers;

use RestlyFriendly\Controller;
use RestlyFriendly\Response;
use Symfony\Component\HttpFoundation\Request;

class Friends extends Controller
{

    public function getFriends(Request $request, array $parameters)
    {

        $result = $this->model('Friends')->getFriends($parameters['id']);

        return new Response(TRUE, $result);

    }

    public function getFriendsOfFriends(Request $request, array $parameters)
    {

        $result = $this->model('Friends')->getFriendsOfFriends($parameters['id']);

        return new Response(TRUE, $result);

    }

}
