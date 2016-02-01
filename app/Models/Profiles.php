<?php

namespace RestlyFriendly\Models;

use RestlyFriendly\Model;

class Profiles extends Model
{

    public function getAllProfiles()
    {

        $query = '
            MATCH (user:Profile)
            RETURN {
                id: ID(user),
                firstName: user.firstName,
                lastName: user.lastName
            } AS result
            ORDER BY ID(user)
        ';

        return $this->db->query($query)->getRows();

    }

    public function getProfile($id)
    {

        $query = '
            MATCH (user:Profile)
            WHERE ID(user) = {id}
            RETURN {
                id: ID(user),
                firstName: user.firstName,
                lastName: user.lastName
            } AS result
        ';

        $parameters = [
            'id' => (integer) $id
        ];

        $result = $this->db->query($query, $parameters)->getRows();

        return isset($result['result'][0])
            ? $result['result'][0]
            : new stdClass;

    }

}
