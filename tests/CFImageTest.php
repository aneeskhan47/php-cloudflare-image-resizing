<?php

use AneesKhan47\CloudflareImageResizing\CFImageResizing;

it('will modify the image url to have /cdn-cgi/image with default format=auto option', function () {
    $url = 'https://example.com/image.jpg';

    $cfImage = CFImageResizing::make($url);

    expect($cfImage->build())->toBe('https://example.com/cdn-cgi/image/format=auto/image.jpg');
});

it('will modify the image url to have /cdn-cgi/image with default format=auto option if the url has a path', function () {
    $url = 'https://example.com/uploads/2023/image.jpg';

    $cfImage = CFImageResizing::make($url);

    expect($cfImage->build())->toBe('https://example.com/cdn-cgi/image/format=auto/uploads/2023/image.jpg');
});

it('will modify the image url to have /cdn-cgi/image with options', function () {
    $url = 'https://example.com/image.jpg';

    $cfImage = CFImageResizing::make($url)
        ->width(300)
        ->height(300)
        ->jpeg()
        ->build();

    expect($cfImage)->toBe('https://example.com/cdn-cgi/image/width=300,height=300,format=jpeg/image.jpg');
});

it('will not add the default format=auto option to the image url if any options is provided', function () {
    $url = 'https://example.com/image.jpg';

    $cfImage = CFImageResizing::make($url)
        ->width(300)
        ->height(300)
        ->build();

    expect($cfImage)->toBe('https://example.com/cdn-cgi/image/width=300,height=300/image.jpg');
});

it('will not modify the image url if it already has /cdn-cgi/image', function () {
    $url = 'https://example.com/cdn-cgi/image/image.jpg';

    $cfImage = CFImageResizing::make($url);

    expect($cfImage->build())->toBe('https://example.com/cdn-cgi/image/image.jpg');
});
