<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAZEJOyOI:APA91bHYP8SZkrph9RGkaEEUhJs3giI9BjD9u5gN4RPTK0B6MctNyk0QDxQvAk-_8pZ0Xt8__kjtn-V6edTJZ3c5HtP7ypNeGilwtUmtXV-of8wcZhiG3ZOXOtTKZKZryb0rxJl3t0Fa'),
        'sender_id' => env('FCM_SENDER_ID', '430609189090'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
