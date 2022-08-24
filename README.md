
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Automatically discover routes in a Laravel app

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-route-discovery.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-route-discovery)
![Tests](https://github.com/spatie/laravel-route-discovery/workflows/Tests/badge.svg)
[![PHPStan](https://github.com/spatie/laravel-route-discovery/actions/workflows/phpstan.yml/badge.svg)](https://github.com/spatie/laravel-route-discovery/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-route-discovery.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-route-discovery)

This package can automatically discover routes for controllers and views in your Laravel application. This isn't an all-in approach. While using use auto discovery, you can still register routes like you're used to.

```php
// typically in a routes file

Discover::controllers()->in($whateverDirectoryYouPrefer);
Discover::views()->in($whateverDirectoryYouPrefer);

// other routes
```

Using PHP attributes you can manipulate discovered routes: you can set a route name, add some middleware, or ...

Here's how you would add middleware to a controller whose's route will be auto discovered.

```php
namespace App\Http\Controllers;

use Illuminate\Routing\Middleware\ValidateSignature;
use OpenDesa\RouteDiscovery\Attributes\Route;

class MyController
{
    #[Route(middleware: ValidateSignature::class)]
    public function myMethod() { /* ... */ }
}
```

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-route-discovery.jpg?t=2" width="419px" />](https://spatie.be/github-ad-click/laravel-route-discovery)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Documentation

You'll find full documentation [at the Spatie website](https://spatie.be/docs/laravel-route-discovery).

## A note on performance

Discovering routes during each application request may have a small impact on performance. For increased performance, we highly recommend [caching your routes](https://laravel.com/docs/8.x/routing#route-caching) as part of your deployment process.

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
