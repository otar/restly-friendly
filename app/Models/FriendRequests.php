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
                id: ID(request),
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

}
