<p align="center">
    <img src="https://raw.githubusercontent.com/aneeskhan47/php-cloudflare-image-resizing/main/art/banner.png" height="300" alt="PHP Cloudflare Image">
    <p align="center">
        <a href="https://github.com/aneeskhan47/php-cloudflare-image-resizing/actions"><img alt="GitHub Workflow Status (master)" src="https://github.com/aneeskhan47/php-cloudflare-image-resizing/actions/workflows/tests.yml/badge.svg"></a>
        <a href="https://packagist.org/packages/aneeskhan47/php-cloudflare-image-resizing"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/aneeskhan47/php-cloudflare-image-resizing"></a>
        <a href="https://packagist.org/packages/aneeskhan47/php-cloudflare-image-resizing"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aneeskhan47/php-cloudflare-image-resizing"></a>
        <a href="https://packagist.org/packages/aneeskhan47/php-cloudflare-image-resizing"><img alt="License" src="https://img.shields.io/packagist/l/aneeskhan47/php-cloudflare-image-resizing"></a>
    </p>
</p>

------

A PHP package to generate Cloudflare Image Resizing URLs. based on [Cloudflare Image Resizing](https://developers.cloudflare.com/images/url-format).

> [!IMPORTANT]  
> Your domain/website must be on Cloudflare (Pro, Business, and Enterprise plans) to use this package.

### ⚡️ Installation

> **Requires [PHP 8.2+](https://php.net/releases/)**

```bash
composer require aneeskhan47/php-cloudflare-image-resizing
```

------

### ❓ How it works

Cloudflare Image Resizing is a feature that allows you to resize, crop, and convert images by simply changing the URL of the image. This is done by adding a set of image transformation parameters to the URL of the image, which Cloudflare will then use to generate a new image on the fly.

So just by adding `/cdn-cgi/image/` to the beginning of the URL, you can utilize Cloudflare's image resizing feature.

You can convert and resize images by requesting them via a specially-formatted URL. This way you do not need to write any code, only change HTML markup of your website to use the new URLs.

For more information, please see the [Cloudflare Image Resizing documentation](https://developers.cloudflare.com/images/url-format).

This package provides a fluent API to generate Cloudflare Image Resizing URLs.

------

### 🚀 Usage

```php
use AneesKhan47\CloudflareImageResizing\CFImageResizing;

$url = 'https://example.com/uploads/2023/image.jpg';

$image = CFImageResizing::make($url)
                ->width(300)
                ->height(300)
                ->webp()
                ->quality(80)
                ->build();

// https://example.com/cdn-cgi/image/width=300,height=300,format=webp,quality=80/uploads/2023/image.jpg
```

------

### 🧪 Testing

🧹 Keep a modern codebase with **Pint**:
```bash
composer lint
```

✅ Run refactors using **Rector**
```bash
composer refacto
```

⚗️ Run static analysis using **PHPStan**:
```bash
composer test:types
```

✅ Run unit tests using **PEST**
```bash
composer test:unit
```

🚀 Run the entire test suite:
```bash
composer test
```

------

### 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

------

### 🤝 Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

------

### 🔒 Security

If you discover any security-related issues, please email kingkhan2388@gmail.com instead of using the issue tracker.

------

### 🙌 Credits

- [Anees Khan](https://github.com/aneeskhan47)
- [All Contributors](../../contributors)

------

### 📜 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

------

### 🔧 Skeleton PHP Boilerplate

This package was generated using the [Skeleton PHP](https://github.com/nunomaduro/skeleton-php) by **[Nuno Maduro](https://twitter.com/enunomaduro)**.
