<?php

return [
    'default' => env('LOGGER_TYPE', 'email'),

    'types' => [
        'email' => [
            'address_to' => env('LOGGER_TO_EMAIL', 'test@test.com')
        ],

        'file' => [
            'path' => env('LOGGER_FILE_PATH', 'logs/logger.log'),
        ],

        'database' => []
    ],

];
