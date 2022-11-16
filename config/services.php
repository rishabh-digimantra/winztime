<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'paytm-wallet' => [
    'env' => 'local', // values : (local | production)
    'merchant_id' => env('YOUR_MERCHANT_ID'),
    'merchant_key' => env('YOUR_MERCHANT_KEY'),
    'merchant_website' => env('YOUR_WEBSITE'),
    'channel' => env('YOUR_CHANNEL'),
    'industry_type' => env('YOUR_INDUSTRY_TYPE'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
      'client_id' => '234077398696758',
      'client_secret' => '790a965ede06b58066f3bf0ec259f557',
      'redirect' => 'https://winztime.com/login/facebook/callback',
    ],


    'google' => [
      'client_id' => '237419119552-1236g8084gtgru94fo998a9et6ag1om5.apps.googleusercontent.com',
      'client_secret' => 'Mdg-aI8-LCrMbF8dRSL8Ibbe',
      'redirect' => 'https://winztime.com/login/google/callback',
    ],

];
