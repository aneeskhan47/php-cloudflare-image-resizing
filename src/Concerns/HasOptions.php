<?php

declare(strict_types=1);

namespace AneesKhan47\CloudflareImageResizing\Concerns;

trait HasOptions
{
    /**
     * The URL.
     */
    private ?string $url = null;

    /**
     * The options.
     */
    private array $options = [];

    /**
     * Set the URL.
     *
     * @param  string  $url  The image URL
     */
    public function url(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the anim.
     *
     * @param  bool  $anim  Whether to animate the image
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#anim
     */
    public function anim(bool $anim): static
    {
        $this->options['anim'] = $anim;

        return $this;
    }

    /**
     * Set the background.
     *
     * @param  string  $background  The background color in css format. hex, rgb, rgba, hsl, hsla
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#background
     */
    public function background(string $background): static
    {
        $this->options['background'] = $background;

        return $this;
    }

    /**
     * Set the blur.
     *
     * @param  int  $blur  The blur radius between 1 (slight blur) and 250 (maximum)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#blur
     */
    public function blur(int $blur): static
    {
        $this->options['blur'] = $blur;

        return $this;
    }

    /**
     * Set the brightness.
     *
     * @param  string  $brightness  The brightness value of 1.0 equals no change, a value of 0.5 equals half brightness, and a value of 2.0 equals twice as bright. 0 is ignored
     */
    public function brightness(string $brightness): static
    {
        $this->options['brightness'] = $brightness;

        return $this;
    }

    /**
     * Set the compression.
     *
     * @param  string  $compression  The compression value
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#compression
     */
    public function compression(string $compression): static
    {
        $this->options['compression'] = $compression;

        return $this;
    }

    /**
     * Set the contrast.
     *
     * @param  float  $contrast  A value of 1.0 equals no change, 0.5 equals low contrast, and 2.0 equals high contrast
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#contrast
     */
    public function contrast(float $contrast): static
    {
        $this->options['contrast'] = $contrast;

        return $this;
    }

    /**
     * Set the device pixel ratio.
     *
     * @param  int  $dpr  Multiplier for width/height that makes it easier to specify higher-DPI sizes
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#dpr
     */
    public function dpr(int $dpr): static
    {
        $this->options['dpr'] = $dpr;

        return $this;
    }

    /**
     * Set the fit mode.
     *
     * @param  string  $fit  The fit mode (scale-down, contain, cover, crop, pad)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#fit
     */
    public function fit(string $fit): static
    {
        $this->options['fit'] = $fit;

        return $this;
    }

    /**
     * Set the format.
     *
     * @param  string  $format  The format (avif, webp, jpeg, baseline-jpeg, json)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#format
     */
    public function format(string $format): static
    {
        $this->options['format'] = $format;

        return $this;
    }

    /**
     * Set the format to avif. alias for `format('avif')`.
     */
    public function avif(): static
    {
        return $this->format('avif');
    }

    /**
     * Set the format to webp. alias for `format('webp')`.
     */
    public function webp(): static
    {
        return $this->format('webp');
    }

    /**
     * Set the format to jpeg. alias for `format('jpeg')`.
     */
    public function jpeg(): static
    {
        return $this->format('jpeg');
    }

    /**
     * Set the format to baseline-jpeg. alias for `format('baseline-jpeg')`.
     */
    public function baselineJpeg(): static
    {
        return $this->format('baseline-jpeg');
    }

    /**
     * Set the format to json. alias for `format('json')`.
     */
    public function json(): static
    {
        return $this->format('json');
    }

    /**
     * Set the gamma.
     *
     * @param  float  $gamma  A value of 1.0 equals no change, 0.5 darkens the image, and 2.0 lightens the image.
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#gamma
     */
    public function gamma(float $gamma): static
    {
        $this->options['gamma'] = $gamma;

        return $this;
    }

    /**
     * Set the gravity for cropping.
     *
     * @param  string  $gravity  Either 'auto', a side ('left', 'right', 'top', 'bottom').
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#gravity
     */
    public function gravity(string $gravity): static
    {
        $this->options['gravity'] = $gravity;

        return $this;
    }

    /**
     * Set the height.
     *
     * @param  int  $height  The height value in pixels
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#height
     */
    public function height(int $height): static
    {
        $this->options['height'] = $height;

        return $this;
    }

    /**
     * Set the metadata preservation mode.
     *
     * @param  string  $metadata  The metadata mode (keep, copyright, none)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#metadata
     */
    public function metadata(string $metadata): static
    {
        $this->options['metadata'] = $metadata;

        return $this;
    }

    /**
     * Set the onerror mode.
     *
     * @param  string  $onerror  The onerror mode (redirect, none)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#onerror
     */
    public function onerror(string $onerror): static
    {
        $this->options['onerror'] = $onerror;

        return $this;
    }

    /**
     * Set the quality.
     *
     * @param  int  $quality  The quality value between 1 (lowest quality) and 100 (highest quality)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#quality
     */
    public function quality(int $quality): static
    {
        $this->options['quality'] = $quality;

        return $this;
    }

    /**
     * Set the rotate angle.
     *
     * @param  int  $rotate  Number of degrees (90, 180, or 270) to rotate the image
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#rotate
     */
    public function rotate(int $rotate): static
    {
        $this->options['rotate'] = $rotate;

        return $this;
    }

    /**
     * Set the saturation level.
     *
     * @param  float  $saturation  A value of 1.0 equals no change, 0.5 equals half saturation, and 2.0 equals twice as saturated
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#saturation
     */
    public function saturation(float $saturation): static
    {
        $this->options['saturation'] = $saturation;

        return $this;
    }

    /**
     * Set the sharpening strength.
     *
     * @param  float  $sharpen  Value between 0 (no sharpening) and 10 (maximum)
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#sharpen
     */
    public function sharpen(float $sharpen): static
    {
        $this->options['sharpen'] = $sharpen;

        return $this;
    }

    /**
     * Set the trim values.
     *
     * @param  string  $trim  The trim value in the form of `top;right;bottom;left`
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#trim
     */
    public function trim(string $trim): static
    {
        $this->options['trim'] = $trim;

        return $this;
    }

    /**
     * Set the width.
     *
     * @param  int  $width  The width value in pixels
     *
     * @see https://developers.cloudflare.com/images/transform-images/transform-via-url/#width
     */
    public function width(int $width): static
    {
        $this->options['width'] = $width;

        return $this;
    }
}
