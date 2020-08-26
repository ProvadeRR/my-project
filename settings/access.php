<?php

return [
    'ALL' => [
        '/^post\/[0-9]+/',
    ],
    'GUEST' => [
        '',
        'authorization',
        'registration',
        'signin',
    ],
    'DEFAULT_USER' => [
        '',
        'addComentary',
        'logout',
    ],
    'ADMIN' => [
        '',
        'admin-panel',
        'addComentary',
        'logout',
        'admin-panel/create-post',
        'admin-panel/create-new-post',
        'admin-panel/posts',
        'admin-panel/users',
        '/delete\/[0-9]+/'
    ]
];