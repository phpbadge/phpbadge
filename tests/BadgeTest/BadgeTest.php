<?php

namespace PHP\BadgeTest;

use PHP\Badge\Badge;
use PHP\Badge\Font\Font;
use PHP\Badge\Part;

class BadgeTest extends AbstractTestCase
{
    public function testGetBorderRadius()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $value = $badge->getBorderRadius();

        // Assert
        $this->assertEquals(0, $value);
    }

    public function testSetBorderRadius()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $badge->setBorderRadius(3);

        // Assert
        $this->assertEquals(3, $badge->getBorderRadius());
    }

    public function testGetHeight()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $value = $badge->getHeight();

        // Assert
        $this->assertEquals(20, $value);
    }

    public function testSetGetHeight()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $badge->setHeight(123);

        // Assert
        $this->assertEquals(123, $badge->getHeight());
    }

    public function testAddPart()
    {
        // Arrange
        $badge = new Badge();
        $part = new Part('hello', '#fff', '#000', new Font(12, '', ''));

        // Act
        $badge->addPart($part);

        // Assert
        $this->assertCount(1, $badge->getParts());
        $this->assertEquals([$part], $badge->getParts());
    }
}
