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

A PHP package to generate Cloudflare Image Resizing/Optimization URLs. based on [Cloudflare Image Optimization](https://developers.cloudflare.com/images/optimization/features/).

### ⚡️ Installation

> **Requires [PHP 8.2+](https://php.net/releases/)**

```bash
composer require aneeskhan47/php-cloudflare-image-resizing
```

------

### ❓ How it works

Cloudflare Image Resizing/Optimization is a feature that allows you to resize, crop, and convert images by simply changing the URL of the image. This is done by adding a set of image transformation parameters to the URL of the image, which Cloudflare will then use to generate a new image on the fly.

So just by adding `/cdn-cgi/image/` to the beginning of the URL, you can utilize Cloudflare's image resizing feature.

You can convert and resize images by requesting them via a specially-formatted URL. This way you do not need to write any code, only change HTML markup of your website to use the new URLs.

For more information, please see the [Cloudflare Image Optimization documentation](https://developers.cloudflare.com/images/optimization/features/).

This package provides a fluent API to generate Cloudflare Image Resizing/Optimization URLs.

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
| `anim(bool)` | Whether to animate the image | [Docs](https://developers.cloudflare.com/images/optimization/features/#anim) |
| `background(string)` | Background color in CSS format (hex, rgb, rgba, hsl, hsla) | [Docs](https://developers.cloudflare.com/images/optimization/features/#background) |
| `blur(int)` | Blur radius between 1 (slight blur) and 250 (maximum) | [Docs](https://developers.cloudflare.com/images/optimization/features/#blur) |
| `brightness(string)` | Value of 1.0 equals no change, 0.5 equals half brightness, 2.0 equals twice as bright | [Docs](https://developers.cloudflare.com/images/optimization/features/#brightness) |
| `compression(string)` | Compression value (e.g. fast) | [Docs](https://developers.cloudflare.com/images/optimization/features/#compression) |
| `contrast(float)` | Value of 1.0 equals no change, 0.5 equals low contrast, 2.0 equals high contrast | [Docs](https://developers.cloudflare.com/images/optimization/features/#contrast) |
| `dpr(int)` | Device pixel ratio multiplier for width/height | [Docs](https://developers.cloudflare.com/images/optimization/features/#dpr) |
| `fit(string)` | Fit mode (scale-down, contain, cover, crop, pad, squeeze) | [Docs](https://developers.cloudflare.com/images/optimization/features/#fit) |
| `flip(string)` | Flip horizontally (h), vertically (v), or both (hv) | [Docs](https://developers.cloudflare.com/images/optimization/features/#flip) |
| `format(string)` | Output format (auto, avif, webp, jpeg, baseline-jpeg, json) | [Docs](https://developers.cloudflare.com/images/optimization/features/#format) |
| `avif()` | Set the format to avif. Alias for `format('avif')`. | [Docs](https://developers.cloudflare.com/images/optimization/features/#format) |
| `webp()` | Set the format to webp. Alias for `format('webp')`. | [Docs](https://developers.cloudflare.com/images/optimization/features/#format) |
| `jpeg()` | Set the format to jpeg. Alias for `format('jpeg')`. | [Docs](https://developers.cloudflare.com/images/optimization/features/#format) |
| `baselineJpeg()` | Set the format to baseline-jpeg. Alias for `format('baseline-jpeg')`. | [Docs](https://developers.cloudflare.com/images/optimization/features/#format) |
| `json()` | Set the format to json. Alias for `format('json')`. | [Docs](https://developers.cloudflare.com/images/optimization/features/#format) |
| `gamma(float)` | Value of 1.0 equals no change, 0.5 darkens, 2.0 lightens | [Docs](https://developers.cloudflare.com/images/optimization/features/#gamma) |
| `gravity(string)` | Cropping gravity (auto, face, left, right, top, bottom, or XxY coordinates) | [Docs](https://developers.cloudflare.com/images/optimization/features/#gravity) |
| `height(int)` | Height in pixels | [Docs](https://developers.cloudflare.com/images/optimization/features/#height) |
| `metadata(string)` | Metadata preservation mode (keep, copyright, none) | [Docs](https://developers.cloudflare.com/images/optimization/features/#metadata) |
| `onerror(string)` | Error handling mode (redirect) | [Docs](https://developers.cloudflare.com/images/optimization/features/#onerror) |
| `quality(int\|string)` | Quality 1-100 or perceptual (high, medium-high, medium-low, low) | [Docs](https://developers.cloudflare.com/images/optimization/features/#quality) |
| `rotate(int)` | Rotation degrees (90, 180, or 270) | [Docs](https://developers.cloudflare.com/images/optimization/features/#rotate) |
| `saturation(float)` | Value of 1.0 equals no change, 0.5 equals half saturation, 2.0 equals twice as saturated | [Docs](https://developers.cloudflare.com/images/optimization/features/#saturation) |
| `segment(string)` | Background removal (foreground) | [Docs](https://developers.cloudflare.com/images/optimization/features/#segment) |
| `segmentForeground()` | Alias for `segment('foreground')` | [Docs](https://developers.cloudflare.com/images/optimization/features/#segment) |
| `sharpen(float)` | Sharpening strength between 0 (none) and 10 (maximum) | [Docs](https://developers.cloudflare.com/images/optimization/features/#sharpen) |
| `slowConnectionQuality(int\|string)` | Override quality on slow connections | [Docs](https://developers.cloudflare.com/images/optimization/features/#slow-connection-quality) |
| `trim(string)` | Trim value (border, top;right;bottom;left, etc.) | [Docs](https://developers.cloudflare.com/images/optimization/features/#trim) |
| `trimBorder()` | Trim sides based on border color | [Docs](https://developers.cloudflare.com/images/optimization/features/#trim) |
| `trimBorderColor(string)` | Border color to trim when using trim=border | [Docs](https://developers.cloudflare.com/images/optimization/features/#trim) |
| `trimBorderTolerance(int)` | Color match tolerance (0-255) when using trim=border | [Docs](https://developers.cloudflare.com/images/optimization/features/#trim) |
| `trimBorderKeep(int)` | Pixels of border to leave when using trim=border | [Docs](https://developers.cloudflare.com/images/optimization/features/#trim) |
| `width(int\|string)` | Width in pixels, or auto for responsive width | [Docs](https://developers.cloudflare.com/images/optimization/features/#width) |
| `zoom(float)` | Face crop zoom (0.0-1.0) when using gravity=face | [Docs](https://developers.cloudflare.com/images/optimization/features/#zoom) |

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
