'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['single'],
        'ignore_exceptions' => false,
    ],

    'single' => [
        'driver' => 'single',
        'path' => storage_path('logs/laravel.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'api' => [
        'driver' => 'single',
        'path' => storage_path('logs/api.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],
]