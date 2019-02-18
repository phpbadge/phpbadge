<?php

namespace PHP\BadgeTest\Font;

use InvalidArgumentException;
use PHP\Badge\Font\Font;
use PHP\BadgeTest\TestCase;

class FontTest extends TestCase
{
    /**
     * @var Font
     */
    private $font;

    public function setUp()
    {
        $this->font = new Font(12, 'name', 'path');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructorWithInvalidSize()
    {
        // Arrange
        // ...

        // Act
        new Font('invalid', 'name', 'path');

        // Assert
        // ...
    }

    public function testGetSize()
    {
        // Arrange
        // ...

        // Act
        $value = $this->font->getSize();

        // Assert
        $this->assertInternalType('int', $value);
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
