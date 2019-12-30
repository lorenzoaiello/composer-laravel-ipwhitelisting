# Laravel Middleware - IP Whitelisting

Laravel middleware for IP whitelisting.

## Compatibility

Only works with Laravel 6.x or higher.

## Installation

```
composer require lorenzoaiello/laravel-ipwhitelisting
```

## Configuration

The middleware will automatically add any IP addresses or CIDR blocks from the `IP_WHITELIST` environment variable. 
By default, only `127.0.0.1` is whitelisted.

## Example

```php
// app/Http/Kernel.php

class Kernel extends HttpKernel
{
    protected $middleware = [
        // ...
        \lorenzoaiello\LaravelIPWhitelisting\WhitelistMiddleware::class,
    ];
    
    // ...
}
```
