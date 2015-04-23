<?php

namespace PHP\BadgeTest\Font;

use PHP\Badge\Font\Font;
use PHP\Badge\Font\GdWidthCalculator;
use PHPUnit_Framework_TestCase;

class GdWidthCalculatorTest extends PHPUnit_Framework_TestCase
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
        $this->assertEquals(31.0, $width);
    }
}
