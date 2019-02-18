<?php

declare(strict_types=1);

namespace PHP\Badge\Font;

interface DimensionCalculatorInterface
{
    public function getWidth(string $text, Font $font): float;

    public function getHeight(string $text, Font $font): float;
}
