<?php

namespace PHP\Badge;

use PHP\Badge\Font\Font;

class Part
{
    private $text;
    private $backColor;
    private $foreColor;
    private $font;
    private $width;

    public function __construct($text, $backColor, $foreColor, Font $font, $width = null)
    {
        $this->text = $text;
        $this->backColor = $backColor;
        $this->foreColor = $foreColor;
        $this->font = $font;
        $this->width = $width;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getBackColor()
    {
        return $this->backColor;
    }

    public function getForeColor()
    {
        return $this->foreColor;
    }

    public function getFont()
    {
        return $this->font;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }
}
