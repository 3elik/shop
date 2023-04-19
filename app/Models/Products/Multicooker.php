<?php

namespace App\Models\Products;

use App\Models\Product;

class Multicooker extends Product
{
    protected $programCount;
    protected $volume;

    public function __construct($name, $content, $price, $programCount, $volume) {
        parent::__construct($name, $content, $price);
        $this->programCount = $programCount;
        $this->volume = $volume;
    }
    /**
     * @return mixed
     */
    public function getProgramCount()
    {
        return $this->programCount;
    }

    /**
     * @param mixed $programCount
     */
    public function setProgramCount($programCount): void
    {
        $this->programCount = $programCount;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume): void
    {
        $this->volume = $volume;
    }

    public function saveParameters()
    {
        // TODO: Implement saveParameters() method.
    }
}
