<?php

return [
    'authorization' => env('AUTHORIZATION', true),
    'token_expired' => 5256000, // 10 years,

    'status' => [
        'pending' => 0,
        'acceptted' => 1,
        'rejected' => 2
    ],

    'role_admin' => 'admin',

    'permission_role_admin' => [
        'admin.index',
        'admin.show',
        'admin.update',
        'admin.store',
        'admin.destroy',
        'user.index',
        'user.show',
        'user.update',
        'user.store',
        'user.destroy',
    ],

    'error_message' => [
        'duplicate_email' => 'Duplicate email',
        'duplicate_phone' => 'Duplicate phone',
    ],
];
