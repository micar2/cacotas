<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    'port' => env('MAIL_PORT', 2525),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'c4c0t4s@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'pato cuack'),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env(' 74835fbe5caeed'),

    'password' => env('c721a9c80327ec'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    'pretend' => false,

];
