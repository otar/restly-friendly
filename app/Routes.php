<?php

return [
    [
        'method' => 'GET',
        'endpoint' => '/',
        'controller' => 'Main',
        'action' => 'home',
        'json' => FALSE
    ],
    [
        'method' => 'GET',
        'endpoint' => '/profiles',
        'controller' => 'Profiles',
        'action' => 'getAllProfiles'
    ],
    [
        'method' => 'GET',
        'endpoint' => '/profiles/{id:number}',
        'controller' => 'Profiles',
        'action' => 'getProfile'
    ],
    [
        'method' => 'GET',
        'endpoint' => '/profiles/{id:number}/friend-requests',
        'controller' => 'FriendRequests',
        'action' => 'getFriendRequests'
    ],
    [
        'method' => 'POST',
        'endpoint' => '/profiles/{id:number}/friend-requests',
        'controller' => 'FriendRequests',
        'action' => 'createFriendRequest'
    ],
    [
        'method' => 'PUT',
        'endpoint' => '/profiles/{id:number}/friend-requests/{request_id:number}',
        'controller' => 'FriendRequests',
        'action' => 'updateFriendRequest'
    ],
    [
        'method' => 'GET',
        'endpoint' => '/profiles/{id:number}/friends',
        'controller' => 'Friends',
        'action' => 'getFriends'
    ],
    [
        'method' => 'GET',
        'endpoint' => '/profiles/{id:number}/friends-of-friends',
        'controller' => 'Friends',
        'action' => 'getFriendsOfFriends'
    ]
];
