<?php

namespace RestlyFriendly\Models;

use RestlyFriendly\Model;

class Friends extends Model
{

    public function getFriends($id)
    {

        $query = '
            MATCH (user1:Profile)-[friends:FRIENDS]->(user2:Profile)
            WHERE ID(user1) = {id}
            RETURN {
                id: ID(user2),
                firstName: user2.firstName,
                lastName: user2.lastName,
                since: friends.since
            } AS result
            ORDER BY friends.since DESC
        ';

        $parameters = [
            'id' => (integer) $id
        ];

        return $this->db->query($query, $parameters)->getRows();

    }

    public function getFriendsOfFriends($id)
    {

        $query = '

        ';

        $parameters = [
            'id' => (integer) $id
        ];

        return $this->db->query($query, $parameters)->getRows();

    }

}
