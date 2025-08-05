# `.test.php` with Laravel + Pest

This is an experiment to see if we can build a testing system similar to `bun:test` using Pest for Laravel.

That means that we write tests directly in the `app/` directory inside of `MyController.test.php` files.

The advantage of this approach is the colocation of the test and the code, which makes the barrier to write tests much lower. This is inline with the locality of behavior principles and reduces the cognitive load of having to switch between files to work on / test the code.

This would result in the following application structure:

```
app/
    Controllers/
		MyController.php
        MyController.test.php
    Services/
		MyService.php
        MyService.test.php
    ...
    Livewire/
		MyLivewireComponent.php
        MyLivewireComponent.test.php
    ...
resources/
    views/
        my-view.blade.php
        my-view.test.blade.php
    ...
```

## How to setup inside an app

### Add new testsuite to `phpunit.xml`

```xml
<testsuite name="Inline">
    <directory suffix=".test.php">./app</directory>
</testsuite>
```

### Exclude `.test.php` files from autoload classmap in `composer.json`

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        },
        "exclude-from-classmap": ["**/*.test.php"]
    }
}
```

## Include the `app/` folder in Pest TestCase

`tests/Pest.php`

```php
pest()->extend(Tests\TestCase::class)
	->in(
		'Feature',
		'../app'
	);
```

### Run tests

```bash
./vendor/bin/pest
```

The tests should now be discovered and runnable.
The autoloader will ignore the `.test.php` files when using `composer dump-autoload --no-dev --optimize`.
