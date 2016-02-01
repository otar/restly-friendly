<?php

namespace RestlyFriendly\Controllers;

use RestlyFriendly\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Main extends Controller
{

    public function home(Request $request, Response $response)
    {

        $response->setContent('API is doing OK.');
        $response->setStatusCode(200);

        return $response;

    }

}
