<?php

namespace PHP\BadgeTest\Font;

use PHP\Badge\Font\Font;
use PHP\Badge\Font\GdWidthCalculator;
use PHP\BadgeTest\TestCase;

class GdWidthCalculatorTest extends TestCase
{
    public function testGetWidth()
    {
        // Arrange
        $font = new Font(12, 'name', 'fonts/verdana.ttf');
        $calculator = new GdWidthCalculator();

        // Act
        $width = $calculator->getWidth('text', $font);

        // Assert
        $this->assertInternalType('float', $width);
        $this->assertNumberWithinInclusiveBounds(30.0, 34.0, $width);
    }

    public function testGetHeight()
    {
        // Arrange
        $font = new Font(12, 'name', 'fonts/verdana.ttf');
        $calculator = new GdWidthCalculator();

        // Act
        $height = $calculator->getHeight('text', $font);

        // Assert
        $this->assertInternalType('float', $height);
        $this->assertNumberWithinInclusiveBounds(10.0, 12.0, $height);
    }
}
