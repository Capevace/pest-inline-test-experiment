## Inline tests

`phpunit.xml`

```xml
<testsuite name="Inline">
    <directory suffix=".test.php">./app</directory>
</testsuite>
```

## Exclude files from classmap

`composer.json`

```json
{
    "exclude-from-classmap": [
        "**/database/factories/**",
        "**/database/seeders/**",
        "**/*.test.php"
    ]
}
```

## Extend Pest

`tests/Pest.php`

```php
pest()->extend(Tests\TestCase::class)
	// ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
	->in(
		'Feature',
		'../app'
	);
```
