<?php

namespace Nikaia\Rating;

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
    protected $defaultStyles = [
        'star-size' => 50,
        'inactive-color' => '#d8d8d8',
        'active-color' => '#ffd055',
        'border-color' => '#999',
        'border-width' => 0,
        'padding' => 0,
        'rounded-corners' => false,
        'inline' => false,
        'glow' => 0,
        'glow-color' => '#000',
        'text-class' => '',
    ];

    /**
     * Minimum rating.
     * default = 0
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
        foreach ($this->defaultStyles as $key => $defaultValue) {
            $build[$key] = array_get($styles, $key, $defaultValue);
        }

        return $this->withMeta($build);
    }

}
