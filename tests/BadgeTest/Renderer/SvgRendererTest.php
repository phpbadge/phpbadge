<?php

namespace PHP\BadgeTest\Renderer;

use PHP\Badge\Badge;
use PHP\Badge\Font\Font;
use PHP\Badge\Font\GdDimensionCalculator;
use PHP\Badge\Part;
use PHP\Badge\Renderer\SvgRenderer;
use PHP\BadgeTest\AbstractTestCase;

final class SvgRendererTest extends AbstractTestCase
{
    public function testRenderNoParts()
    {
        // Arrange
        $renderer = new SvgRenderer(new GdDimensionCalculator());
        $badge = new Badge();

        // Act
        $result = $renderer->render($badge);

        // Assert
        $this->assertStringEqualsFile('tests/BadgeTestAsset/no-border-no-parts.svg', $result);
    }

    public function testRenderOnePart()
    {
        // Arrange
        $renderer = new SvgRenderer(new GdDimensionCalculator());

        $font = new Font(12, 'verdana', 'fonts/verdana.ttf');

        $badge = new Badge();
        $badge->addPart(new Part('text', 'red', 'blue', $font));

        // Act
        $result = $renderer->render($badge);

        // Assert
        $this->assertStringMatchesFormatFile('tests/BadgeTestAsset/no-border-one-part.svg', $result);
    }

    public function testRenderTwoPart()
    {
        // Arrange
        $renderer = new SvgRenderer(new GdDimensionCalculator());

        $font = new Font(12, 'verdana', 'fonts/verdana.ttf');

        $badge = new Badge();
        $badge->addPart(new Part('text1', 'red', 'blue', $font));
        $badge->addPart(new Part('text2', 'blue', 'red', $font));

        // Act
        $result = $renderer->render($badge);

        // Assert
        $this->assertStringMatchesFormatFile('tests/BadgeTestAsset/no-border-two-parts.svg', $result);
    }

    public function testRenderTwoPartWithBorder()
    {
        // Arrange
        $renderer = new SvgRenderer(new GdDimensionCalculator());

        $font = new Font(12, 'verdana', 'fonts/verdana.ttf');

        $badge = new Badge();
        $badge->setBorderRadius(3);
        $badge->addPart(new Part('text1', 'red', 'blue', $font));
        $badge->addPart(new Part('text2', 'blue', 'red', $font));

        // Act
        $result = $renderer->render($badge);

        // Assert
        $this->assertStringMatchesFormatFile('tests/BadgeTestAsset/with-border-two-parts.svg', $result);
    }

    public function testRenderTwoPartWithBorderAndPredifinedWidth()
    {
        // Arrange
        $renderer = new SvgRenderer(new GdDimensionCalculator());

        $font = new Font(12, 'verdana', 'fonts/verdana.ttf');

        $badge = new Badge();
        $badge->setBorderRadius(3);
        $badge->addPart(new Part('text1', 'red', 'blue', $font, 100));
        $badge->addPart(new Part('text2', 'blue', 'red', $font, 200));

        // Act
        $result = $renderer->render($badge);

        // Assert
        $this->assertStringMatchesFormatFile('tests/BadgeTestAsset/with-border-two-parts-predefined.svg', $result);
    }
}
