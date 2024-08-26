# Cloudflare's Turnstile For Laravel

> A Laravel package to facilitate the server side validation of Cloudflare's Turnstile captcha service.

[![GitHub release](https://img.shields.io/github/release/derekcodes-io/turnstile-laravel)](https://GitHub.com/derekcodes-io/turnstile-laravel/releases/) [![GitHub repo size](https://img.shields.io/github/repo-size/derekcodes-io/turnstile-laravel)] [![Packagist Downloads](https://img.shields.io/packagist/dt/derekcodes/turnstile-laravel?color=blue)]

## Configuration

First you'll need an account Cloudflare and Turnstile setup for your website. 

[https://developers.cloudflare.com/turnstile/](https://developers.cloudflare.com/turnstile/)

## Installation

Install via composer
```bash
composer require derekcodes/turnstile-laravel 
```

Adding your secret key in the .env file
```bash
TURNSTILE_SITE_KEY="0x4AAAAAAAXXXXXXXXXXXXXX"
TURNSTILE_SECRET_KEY="0x4AAAAAAAXXXXXXXXXXXXXX"
```

Create a `config/turnstile.php`
```bash
php artisan vendor:publish --tag=turnstile-config
```

## Front-end

Be sure to add the front-end JavaScript from Turnstile: [https://developers.cloudflare.com/turnstile/get-started/client-side-rendering/](https://developers.cloudflare.com/turnstile/get-started/client-side-rendering/)

To save you some time, here's the Turnstile JavaScript necessary for an HTML form. Note that I assume you're using a Blade template, thus the `{{ config('turnstile.site_key') }}`.
```javascript
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback" defer></script>

window.onloadTurnstileCallback = function () {
    turnstile.render('#your-form-id', {
        sitekey: '{{ config('turnstile.site_key') }}',
        callback: function(token) {
            console.log(`Challenge Success ${token}`);
        },
    });
};
```

## Usage

Add the `use` statement at the top of your file 
```php
use DerekCodes\TurnstileLaravel\TurnstileLaravel;
```

Initiate the `TursileLaravel` object and call the `validate` method passing the client response Turnstile's JavaScript provides
```php
$turnstile = new TurnstileLaravel;
$response = $turnstile->validate($request->get('cf-turnstile-response'));
```

Ensure the response is valid
```php
if (get_data($response, 'status', 0) == 1) {
  // TODO: add success code here
}
```

## Responses

Example success response
```json
{
  "status": 1
}
```

Example error response
```json
{
  "status": 0,
  "turnstile_response": {
    "success": false,
    "error-codes": [
      "invalid-input-response"
    ],
    "messages": []
  }
}
```

## Credits

~ Derek Codes
 - Website: [https://www.derekcodes.io](https://www.derekcodes.io)
 - Twitter: [https://twitter.com/DerekCodes_io](https://twitter.com/DerekCodes_io)

Derek Codes is a comprehensive collection of tutorials on the most popular languages in the industry. You’ll find videos, guides and downloadable assets to help you learn to code PHP, Laravel, JavaScript, CSS and more. Thanks for watching! 
