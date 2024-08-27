<?php
    return [
        'secret_key' => env('TURNSTILE_SECRET_KEY', null),
        'site_key' => env('TURNSTILE_SITE_KEY', null),
    ];