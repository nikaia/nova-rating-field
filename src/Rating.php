<?php

namespace Nikaia\Rating;

use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Field;

class Rating extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'rating';

    /**
     * Default component styles.
     *
     * @var array
     */
    protected static $defaultStyles = [
        'star-size' => 30,
        'active-color' => 'var(--primary)',
        'inactive-color' => '#d8d8d8',
        'border-color' => 'var(--60)',
        'border-width' => 0,
        'padding' => 10,
        'rounded-corners' => false,
        'inline' => false,
        'glow' => 0,
        'glow-color' => '#fff',
        'text-class' => 'inline-block text-80 h-9 pt-2',
    ];

    /**
     * Rating constructor.
     *
     * @param string $name
     * @param null|string $attribute
     * @param mixed|null $resolveCallback
     */
    public function __construct(string $name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta(['min' => 0, 'max' => 5]);
        $this->withStyles(static::$defaultStyles);
    }

    /**
     * Minimum rating.
     * default = 0.
     *
     * @param $min
     * @return Rating
     */
    public function min($min)
    {
        return $this->withMeta(['min' => $min]);
    }

    /**
     * @param $max int Maximum rating.
     * This will let the component know how many stars it should display.
     *
     * @return Rating
     */
    public function max($max)
    {
        return $this->withMeta(['max' => $max]);
    }

    /**
     * @param float The rating increment
     * for example pass 0.5 for half stars or 0.01 for fluid stars.
     * Expects a number between 0.01 - 1.
     *
     * @return Rating
     */
    public function increment($increment)
    {
        return $this->withMeta(['increment' => $increment]);
    }

    /**
     * Show rating value next to stars.
     * this is the default behaviour.
     *
     * @return Rating
     */
    public function showRating()
    {
        return $this->withMeta(['showRating' => true]);
    }

    /**
     * Hide rating value next to stars.
     * By default rating will be displayed unless you use this method.
     *
     * @return Rating
     */
    public function hideRating()
    {
        return $this->withMeta(['showRating' => false]);
    }

    /**
     * Style the component.
     *
     * @param array $styles
     * @return Rating
     */
    public function withStyles(array $styles)
    {
        $build = [];
        foreach (static::$defaultStyles as $key => $defaultValue) {
            $build[$key] = Arr::get($styles, $key, $defaultValue);
        }

        return $this->withMeta($build);
    }
}
