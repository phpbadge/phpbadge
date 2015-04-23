<?php

namespace PHP\Badge\Font;

use InvalidArgumentException;

class Font
{
    private $size;
    private $name;
    private $path;

    public function __construct($size, $name, $path)
    {
        if (!is_int($size) && !ctype_digit($size)) {
            throw new InvalidArgumentException('Invalid size proviided: ' . $size);
        }

        $this->size = $size;
        $this->name = $name;
        $this->path = $path;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPath()
    {
        return $this->path;
    }
}
