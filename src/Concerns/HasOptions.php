<?php

declare(strict_types=1);

namespace AneesKhan47\CloudflareImageResizing\Concerns;

trait HasOptions
{
    /**
     * The image URL.
     */
    private ?string $url = null;

    /**
     * The image options.
     */
    private array $options = [];

    /**
     * Set the image URL.
     *
     * @param  string  $url  The image URL.
     */
    public function url(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the image anim.
     *
     * @param  bool  $anim  Whether to animate the image.
     *
     * @see https://developers.cloudflare.com/images/image-resizing/url-format/#anim
     */
    private function anim(bool $anim): static
    {
        $this->options['anim'] = $anim;

        return $this;
    }

    /**
     * Set the image background.
     *
     * @param  string  $background  The background color in css format. hex, rgb, rgba, hsl, hsla.
     *
     * @see https://developers.cloudflare.com/images/image-resizing/url-format/#background
     */
    private function background(string $background): static
    {
        $this->options['background'] = $background;

        return $this;
    }

    /**
     * Set the image blur.
     *
     * @param  int  $blur  The blur radius between 1 (slight blur) and 250 (maximum).
     *
     * @see https://developers.cloudflare.com/images/image-resizing/url-format/#blur
     */
    private function blur(int $blur): static
    {
        $this->options['blur'] = $blur;

        return $this;
    }

    /**
     * Set the image brightness.
     *
     * @param  string  $brightness  The brightness value of 1.0 equals no change, a value of 0.5 equals half brightness, and a value of 2.0 equals twice as bright. 0 is ignored.
     */
    private function brightness(string $brightness): static
    {
        $this->options['brightness'] = $brightness;

        return $this;
    }

    /**
     * Set the image format.
     */
    private function format(string $format): static
    {
        $this->options['format'] = $format;

        return $this;
    }

    /**
     * Set the image format to avif.
     */
    public function avif(): static
    {
        return $this->format('avif');
    }

    /**
     * Set the image format to webp.
     */
    public function webp(): static
    {
        return $this->format('webp');
    }

    /**
     * Set the image format to jpeg.
     */
    public function jpeg(): static
    {
        return $this->format('jpeg');
    }

    /**
     * Set the image format to baseline-jpeg.
     */
    public function baselineJpeg(): static
    {
        return $this->format('baseline-jpeg');
    }

    /**
     * Set the image format to json.
     */
    public function json(): static
    {
        return $this->format('json');
    }

    /**
     * Set the image quality.
     */
    public function quality(int $quality): static
    {
        $this->options['quality'] = $quality;

        return $this;
    }

    /**
     * Set the image width.
     */
    public function width(int $width): static
    {
        $this->options['width'] = $width;

        return $this;
    }

    /**
     * Set the image height.
     */
    public function height(int $height): static
    {
        $this->options['height'] = $height;

        return $this;
    }
}
