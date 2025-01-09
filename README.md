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

A PHP package to generate Cloudflare Image Resizing URLs. based on [Cloudflare Image Resizing](https://developers.cloudflare.com/images/transform-images/transform-via-url).

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

For more information, please see the [Cloudflare Image Resizing documentation](https://developers.cloudflare.com/images/transform-images/transform-via-url).

This package provides a fluent API to generate Cloudflare Image Resizing URLs.

------

### 🚀 Usage

#### Generating a URL without any transformations

```php
use AneesKhan47\CloudflareImageResizing\CFImageResizing;

$url = 'https://example.com/uploads/2023/image.jpg';

$image = CFImageResizing::make($url)->build();

// output: 
// https://example.com/cdn-cgi/image/format=auto/uploads/2023/image.jpg

// note: format=auto is added by default to the URL as it is required 
// by Cloudflare to have atleast one transformation applied.
```

#### Generating a URL with transformations

```php
use AneesKhan47\CloudflareImageResizing\CFImageResizing;

$url = 'https://example.com/uploads/2023/image.jpg';

$image = CFImageResizing::make($url)
                        ->width(300)
                        ->height(300)
                        ->webp()
                        ->quality(80)
                        ->build();

// output: 
// https://example.com/cdn-cgi/image/width=300,height=300,format=webp,quality=80/uploads/2023/image.jpg
```

#### Available transformations

| Transformation | Description | Cloudflare Docs |
|---------------|-------------|---------------|
| `anim(bool)` | Whether to animate the image | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#anim) |
| `background(string)` | Background color in CSS format (hex, rgb, rgba, hsl, hsla) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#background) |
| `blur(int)` | Blur radius between 1 (slight blur) and 250 (maximum) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#blur) |
| `brightness(string)` | Value of 1.0 equals no change, 0.5 equals half brightness, 2.0 equals twice as bright | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#brightness) |
| `compression(string)` | Compression value | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#compression) |
| `contrast(float)` | Value of 1.0 equals no change, 0.5 equals low contrast, 2.0 equals high contrast | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#contrast) |
| `dpr(int)` | Device pixel ratio multiplier for width/height | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#dpr) |
| `fit(string)` | Fit mode (scale-down, contain, cover, crop, pad) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#fit) |
| `format(string)` | Output format (avif, webp, jpeg, baseline-jpeg, json) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#format) |
| `avif()` | Set the format to avif. alias for `format('avif')`. | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#format) |
| `webp()` | Set the format to webp. alias for `format('webp')`. | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#format) |
| `jpeg()` | Set the format to jpeg. alias for `format('jpeg')`. | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#format) |
| `baselineJpeg()` | Set the format to baseline-jpeg. alias for `format('baseline-jpeg')`. | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#format) |
| `json()` | Set the format to json. alias for `format('json')`. | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#format) |
| `gamma(float)` | Value of 1.0 equals no change, 0.5 darkens, 2.0 lightens | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#gamma) |
| `gravity(string)` | Cropping gravity (auto, left, right, top, bottom) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#gravity) |
| `height(int)` | Height in pixels | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#height) |
| `metadata(string)` | Metadata preservation mode (keep, copyright, none) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#metadata) |
| `onerror(string)` | Error handling mode (redirect, none) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#onerror) |
| `quality(int)` | Quality between 1 (lowest) and 100 (highest) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#quality) |
| `rotate(int)` | Rotation degrees (90, 180, or 270) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#rotate) |
| `saturation(float)` | Value of 1.0 equals no change, 0.5 equals half saturation, 2.0 equals twice as saturated | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#saturation) |
| `sharpen(float)` | Sharpening strength between 0 (none) and 10 (maximum) | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#sharpen) |
| `trim(string)` | Trim values in format "top;right;bottom;left" | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#trim) |
| `width(int)` | Width in pixels | [Docs](https://developers.cloudflare.com/images/transform-images/transform-via-url/#width) |

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
