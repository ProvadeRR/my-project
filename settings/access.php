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

    ]
];