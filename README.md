# CloudFlare's Turnstile For Laravel

> A laravel package to facilite the server side validation of Cloudflare's Turnstile captcha service.

## Configuration

First you'll need an account CloudFlare and Turnstile setup for your website. 

[https://developers.cloudflare.com/turnstile/](https://developers.cloudflare.com/turnstile/)

## Installation

Install via composer
```bash
composer require derekcodes-io/turnstile-laravel
```

Adding your secret key in the .env file
```bash
TURNSTILE_SECRET_KEY="0x4AAAAAAAXXXXXXXXXXXXXX"
```

Create a `config/turnstile.php`
```php
<?php
    return [
        'secret_key' => env('TURNSTILE_SECRET_KEY', null),
    ];
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
if ($response['status'] == true) {
  // TODO: add success code here
}
```

## Credits

~ Derek Codes
 - Website: [https://www.derekcodes.io](https://www.derekcodes.io)
 - Twitter: [https://twitter.com/DerekCodes_io](https://twitter.com/DerekCodes_io)

Derek Codes is a comprehensive collection of tutorials on the most popular languages in the industry. You’ll find videos, guides and downloadable assets to help you learn to code PHP, Laravel, JavaScript, CSS and more. Thanks for watching! 
