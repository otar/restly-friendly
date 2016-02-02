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
            MATCH (user1:Profile)-[friends:FRIENDS*2..3]->(user2:Profile)
            WHERE ID(user1) = {id}
            RETURN {
                id: ID(user1),
                firstName: user1.firstName,
                lastName: user1.lastName,
                friendsOfFriends: collect(user2)
            } AS result
        ';

        $parameters = [
            'id' => (integer) $id
        ];

        $result = $this->db->query($query, $parameters)->getRows();

        return isset($result['result'][0])
            ? $result['result'][0]
            : [];

    }

}
