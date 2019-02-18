<?php

declare(strict_types=1);

namespace PHP\Badge\Font;

final class GdDimensionCalculator implements DimensionCalculatorInterface
{
    public function getWidth(string $text, Font $font): float
    {
        $box = imagettfbbox($font->getSize(), 0, $font->getPath(), $text);

        return round(abs($box[2] - $box[0]), 1);
    }

    public function getHeight(string $text, Font $font): float
    {
        $box = imagettfbbox($font->getSize(), 0, $font->getPath(), $text);

        return round(abs($box[7]) - abs($box[1]), 1);
    }
}
