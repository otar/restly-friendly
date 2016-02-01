<?php

namespace RestlyFriendly\Controllers;

use RestlyFriendly\Controller;
use RestlyFriendly\Response;
use Symfony\Component\HttpFoundation\Request;

class Profiles extends Controller
{

    public function getAllProfiles()
    {

        $result = $this->model('Profiles')->getAllProfiles();

        return new Response(TRUE, $result);

    }

    public function getProfile(Request $request, array $parameters)
    {

        $result = $this->model('Profiles')->getProfile($parameters['id']);

        return new Response(TRUE, $result);

    }

}
