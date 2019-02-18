<?php

namespace PHP\BadgeTest;

use PHP\Badge\Badge;
use PHP\BadgeTest\TestCase;

class BadgeTest extends TestCase
{
    public function testGetBorderRadius()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $value = $badge->getBorderRadius();

        // Assert
        $this->assertInternalType('int', $value);
        $this->assertEquals(0, $value);
    }

    public function testSetBorderRadius()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $badge->setBorderRadius(3);

        // Assert
        $this->assertInternalType('int', $badge->getBorderRadius());
        $this->assertEquals(3, $badge->getBorderRadius());
    }

    public function testSetBorderRadiusWithFloat()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $badge->setBorderRadius(3.4);

        // Assert
        $this->assertInternalType('int', $badge->getBorderRadius());
        $this->assertEquals(3, $badge->getBorderRadius());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetBorderRadiusWithInvalidNumber()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $badge->setBorderRadius('abc');

        // Assert
        // ...
    }

    public function testGetHeight()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $value = $badge->getHeight();

        // Assert
        $this->assertInternalType('int', $value);
        $this->assertEquals(20, $value);
    }

    public function testSetGetHeight()
    {
        // Arrange
        $badge = new Badge();

        // Act
        $badge->setHeight(123);

        // Assert
        $this->assertInternalType('int', $badge->getHeight());
        $this->assertEquals(123, $badge->getHeight());
    }

    public function testAddPart()
    {
        // Arrange
        $badge = new Badge();
        $part = $this->getMockBuilder('PHP\\Badge\\Part')->disableOriginalConstructor()->getMock();

        // Act
        $badge->addPart($part);

        // Assert
        $this->assertCount(1, $badge->getParts());
        $this->assertEquals(array($part), $badge->getParts());
    }
}
