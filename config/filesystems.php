<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'unit_institutes' => [
            'driver' => 'local',
            'root' => storage_path('app/public/unit_institutes'),
            'url' => env('APP_URL') . '/storage/unit_institutes',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],



        'news_image' => [
            'driver' => 'local',
            'root' => public_path('image/news'),
            'url' => env('APP_URL') . '/image/news',
            'visibility' => 'public',
        ],

        'news_images_news' => [
            'driver' => 'local',
            'root' => public_path('image/image_news'),
            'url' => env('APP_URL') . '/image/image_news',
            'visibility' => 'public',
        ],

        'detail_news' => [
            'driver' => 'local',
            'root' => public_path('image/detail-news'),
            'url' => env('APP_URL') . '/image/detail-news',
            'visibility' => 'public',
        ],



        'details_news' => [
            'driver' => 'local',
            'root' => public_path('image/details_news'),
            'url' => env('APP_URL') . '/image/details_news',
            'visibility' => 'public',
        ],

        'cv' => [
            'driver' => 'local',
            'root' => public_path('image/resume'),
            'url' => env('APP_URL') . '/image/resume',
            'visibility' => 'public',
        ],

        'researches' => [
            'driver' => 'local',
            'root' => public_path('image/researches'),
            'url' => env('APP_URL') . '/image/researches',
            'visibility' => 'public',
        ],

        'personal_image' => [
            'driver' => 'local',
            'root' => public_path('image/images_doctor'),
            'url' => env('APP_URL') . '/image/images_doctor',
            'visibility' => 'public',
        ],

        'setting-logo' => [
            'driver' => 'local',
            'root' => public_path('image/setting-logo'),
            'url' => env('APP_URL') . '/image/setting-logo',
            'visibility' => 'public',
        ],
        'department-file' => [
            'driver' => 'local',
            'root' => public_path('image/department-file'),
            'url' => env('APP_URL') . '/image/department-file',
            'visibility' => 'public',
        ],

        'department-image' => [
            'driver' => 'local',
            'root' => public_path('image/department-image'),
            'url' => env('APP_URL') . '/image/department-image',
            'visibility' => 'public',
        ],
        'student_featured_work' => [
            'driver' => 'local',
            'root' => public_path('image/student_featured_work'),
            'url' => env('APP_URL') . '/image/student_featured_work',
            'visibility' => 'public',
        ],
        'studentOpinions' => [
            'driver' => 'local',
            'root' => public_path('image/studentOpinions'),
            'url' => env('APP_URL') . '/image/studentOpinions',
            'visibility' => 'public',
        ],

        'libraryOpinions' => [
            'driver' => 'local',
            'root' => public_path('image/libraryOpinions'),
            'url' => env('APP_URL') . '/image/libraryOpinions',
            'visibility' => 'public',
        ],
        
        'article' => [
            'driver' => 'local',
            'root' => public_path('image/article'),
            'url' => env('APP_URL') . '/image/article',
            'visibility' => 'public',
        ],

        'slider' => [
            'driver' => 'local',
            'root' => public_path('image/image_slider'),
            'url' => env('APP_URL') . '/image/image_slider',
            'visibility' => 'public',
        ],
        'unit' => [
            'driver' => 'local',
            'root' => public_path('image/unit'),
            'url' => env('APP_URL') . '/image/unit',
            'visibility' => 'public',
        ],
        
        'scholarships' => [
            'driver' => 'local',
            'root' => public_path('image/scholarship'),
            'url' => env('APP_URL') . '/image/scholarship',
            'visibility' => 'public',
        ],

        'schedules' => [
            'driver' => 'local',
            'root' => public_path('image/schedules'),
            'url' => env('APP_URL') . '/image/schedules',
            'visibility' => 'public',
        ],





        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
