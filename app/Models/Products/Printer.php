<?php

namespace App\Models\Products;

use App\Models\Product;

class Printer extends Product
{
    protected $isColor;
    protected $printType;
    protected $paperType;

    public function __construct($name, $content, $price, $isColor, $printType, $paperType) {
        parent::__construct($name, $content, $price);
        $this->isColor = $isColor;
        $this->printType = $printType;
        $this->paperType = $paperType;
    }

    /**
     * @return mixed
     */
    public function getIsColor()
    {
        return $this->isColor;
    }

    /**
     * @param mixed $isColor
     */
    public function setIsColor($isColor): void
    {
        $this->isColor = $isColor;
    }

    /**
     * @return mixed
     */
    public function getPrintType()
    {
        return $this->printType;
    }

    /**
     * @param mixed $printType
     */
    public function setPrintType($printType): void
    {
        $this->printType = $printType;
    }

    /**
     * @return mixed
     */
    public function getPaperType()
    {
        return $this->paperType;
    }

    /**
     * @param mixed $paperType
     */
    public function setPaperType($paperType): void
    {
        $this->paperType = $paperType;
    }

    public function saveParameters()
    {
        // TODO: Implement saveParameters() method.
    }
}
