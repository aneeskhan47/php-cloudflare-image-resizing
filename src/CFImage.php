<?php

declare(strict_types=1);

namespace AneesKhan47\CloudflareImage;

use AneesKhan47\CloudflareImage\Concerns\HasOptions;
use Exception;

final class CFImage
{
    use HasOptions;

    /**
     * Create a new CFImage instance.
     *
     * @param  string|null  $url  The image URL.
     * @return void
     */
    public function __construct(string $url = null)
    {
        $this->url($url);
    }

    /**
     * Make a new CFImage instance.
     *
     * @param  string|null  $url  The image URL.
     */
    public static function make(string $url = null): static
    {
        return new self($url);
    }

    /**
     * Build the image URL.
     *
     * @throws Exception
     */
    public function build(): ?string
    {
        if (blank($this->url)) {
            throw new Exception('URL has not been set.');
        }

        // Check if '/cdn-cgi/image' is already present in the URL
        if (str_contains($this->url, '/cdn-cgi/image')) {
            return $this->url;
        }

        $path = parse_url($this->url, PHP_URL_PATH);

        // Construct the options string
        $options = [];

        foreach ($this->options as $key => $value) {
            $options[] = "{$key}={$value}";
        }

        $optionsString = implode(',', $options);

        $finalUrl = blank($optionsString) ? "/cdn-cgi/image{$path}" : "/cdn-cgi/image/{$optionsString}{$path}";

        return str_replace($path, $finalUrl, $this->url);
    }
}
