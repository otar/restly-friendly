<?php

namespace RestlyFriendly\Models;

use RestlyFriendly\Model;

class FriendRequests extends Model
{

    public function getFriendRequests($id)
    {

        $query = '
            MATCH (requester:Profile)-[request:FRIEND_REQUEST]->(user:Profile)
            WHERE ID(user) = {id}
            RETURN {
                requesterId: ID(requester),
                requestId: ID(request),
                firstName: requester.firstName,
                lastName: requester.lastName,
                status: request.status,
                createdAt: request.createdAt
            } AS result
            ORDER BY request.createdAt DESC
        ';

        $parameters = [
            'id' => (integer) $id
        ];

        return $this->db->query($query, $parameters)->getRows();

    }

    public function createFriendRequest($user, $requester)
    {

        $query = '
            MATCH (requester:Profile), (user:Profile)
            WHERE ID(user) = {user}
            AND ID(requester) = {requester}
            CREATE (requester)
                -[:FRIEND_REQUEST {
                    status: \'pending\',
                    createdAt: TIMESTAMP()
                }]
                ->(user)
            RETURN {
                created: true
            } AS result
        ';

        $parameters = [
            'user' => (integer) $user,
            'requester' => (integer) $requester
        ];

        $result = $this->db->query($query, $parameters)->getRows();

        return isset($result['result'][0])
                    ? $result['result'][0]
                    : new stdClass;

    }

    public function updateFriendRequest()
    {



    }

}
