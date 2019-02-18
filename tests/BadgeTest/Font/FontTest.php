<?php

namespace PHP\BadgeTest\Font;

use PHP\Badge\Font\Font;
use PHP\BadgeTest\AbstractTestCase;

final class FontTest extends AbstractTestCase
{
    /**
     * @var Font
     */
    private $font;

    public function setUp()
    {
        $this->font = new Font(12, 'name', 'path');
    }

    public function testGetSize()
    {
        // Arrange
        // ...

        // Act
        $value = $this->font->getSize();

        // Assert
        $this->assertEquals(12, $value);
    }

    public function testGetName()
    {
        // Arrange
        // ...

        // Act
        $value = $this->font->getName();

        // Assert
        $this->assertEquals('name', $value);
    }

    public function testGetPath()
    {
        // Arrange
        // ...

        // Act
        $value = $this->font->getPath();

        // Assert
        $this->assertEquals('path', $value);
    }
}
