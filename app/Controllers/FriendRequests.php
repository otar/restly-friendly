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

        $post = $this->getPostData($request);

        if (
               !isset($post['requester'])
            OR !is_numeric($post['requester'])
        )
        {
            // TODO: Add error message
            return new Response();
        }

        $result = $this->model('FriendRequests')->createFriendRequest(
            $parameters['id'],
            $post['requester']
        );

        return new Response(TRUE, $result);

    }

    public function updateFriendRequest(Request $request, array $parameters)
    {

        $result = $this->model('FriendRequests')->createFriendRequest($parameters['id'], 1);

        return new Response(TRUE, $result);

    }

}
