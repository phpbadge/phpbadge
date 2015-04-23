<?php

namespace PHP\Badge;

use InvalidArgumentException;
use PHP\Badge\Part;

class Badge
{
    private $borderRadius;
    private $height;
    private $parts;

    public function __construct()
    {
        $this->borderRadius = 0;
        $this->height = 20;
        $this->parts = array();
    }

    public function getBorderRadius()
    {
        return $this->borderRadius;
    }

    public function setBorderRadius($borderRadius)
    {
        if (!is_int($borderRadius) && !is_float($borderRadius) && !ctype_digit($borderRadius)) {
            throw new InvalidArgumentException('Invalid border radius proviided: ' . $borderRadius);
        }

        $this->borderRadius = (int)$borderRadius;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function addPart(Part $part)
    {
        $this->parts[] = $part;
    }

    public function getParts()
    {
        return $this->parts;
    }
}
