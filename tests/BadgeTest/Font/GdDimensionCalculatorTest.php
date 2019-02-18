<?php

namespace PHP\BadgeTest\Font;

use PHP\Badge\Font\Font;
use PHP\Badge\Font\GdDimensionCalculator;
use PHP\BadgeTest\AbstractTestCase;

final class GdDimensionCalculatorTest extends AbstractTestCase
{
    public function testGetWidth()
    {
        // Arrange
        $font = new Font(12, 'name', 'fonts/verdana.ttf');
        $calculator = new GdDimensionCalculator();

        // Act
        $width = $calculator->getWidth('text', $font);

        // Assert
        static::assertNumberWithinInclusiveBounds(30.0, 34.0, $width);
    }

    public function testGetHeight()
    {
        // Arrange
        $font = new Font(12, 'name', 'fonts/verdana.ttf');
        $calculator = new GdDimensionCalculator();

        // Act
        $height = $calculator->getHeight('text', $font);

        // Assert
        static::assertNumberWithinInclusiveBounds(10.0, 12.0, $height);
    }
}
