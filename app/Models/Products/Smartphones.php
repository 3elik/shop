<?php

namespace App\Models\Products;

use App\Models\Product;

class Smartphones extends Product
{
    protected $color;
    protected $screen;
    protected $battery;

    public function __construct($name, $content, $price, $color, $screen, $battery) {
        parent::__construct($name, $content, $price);
        $this->color = $color;
        $this->screen = $screen;
        $this->battery = $battery;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * @param mixed $screen
     */
    public function setScreen($screen): void
    {
        $this->screen = $screen;
    }

    /**
     * @return mixed
     */
    public function getBattery()
    {
        return $this->battery;
    }

    /**
     * @param mixed $battery
     */
    public function setBattery($battery): void
    {
        $this->battery = $battery;
    }

    public function saveParameters()
    {
        // TODO: Implement saveParameters() method.
    }
}
