<?php

declare(strict_types=1);

namespace PHP\Badge\Renderer;

use PHP\Badge\Badge;
use PHP\Badge\Font\DimensionCalculatorInterface;
use PHP\Badge\Part;

final class SvgRenderer implements RendererInterface
{
    /** @var DimensionCalculatorInterface */
    private $dimensionCalculator;

    public function __construct(DimensionCalculatorInterface $dimensionCalculator)
    {
        $this->dimensionCalculator = $dimensionCalculator;
    }

    private function calculateWidth(Part $part): float
    {
        $width = $part->getWidth();

        if ($width === null) {
            $width = $this->dimensionCalculator->getWidth(
                $part->getText(),
                $part->getFont()
            ) + 10;
        }

        return $width;
    }

    private function calculateTextYCoordinate(Badge $badge, Part $part): float
    {
        $textHeight = $this->dimensionCalculator->getHeight(
            $part->getText(),
            $part->getFont()
        );

        return floor($badge->getHeight() / 2) + floor($textHeight / 2) - 1;
    }

    /**
     * @return float[]
     */
    private function calculateBoxWidths(Badge $badge): array
    {
        $widths = [];

        foreach ($badge->getParts() as $part) {
            $widths[] = $this->calculateWidth($part);
        }

        return $widths;
    }

    private function renderBoxes(Badge $badge, float &$totalWidth): string
    {
        $result = '';

        // Calculate the widths:
        $widths = $this->calculateBoxWidths($badge);
        $totalWidth = (float)array_sum($widths);

        // The radius of the badge:
        $radius = $badge->getBorderRadius();

        $position = 0;
        $remainingWidth = $totalWidth;

        $parts = $badge->getParts();
        $partCount = count($parts);
        
        for ($i = 0; $i < $partCount; ++$i) {
            $result .= sprintf(
                '<rect rx="%d" x="%d" width="%d" height="%s" fill="%s" />',
                $radius,
                $position,
                $remainingWidth,
                $badge->getHeight(),
                $parts[$i]->getBackColor()
            );

            if ($i > 0 && $radius > 0) {
                $result .= sprintf(
                    '<path fill="%s" d="M%d 0 h%d v%d h-%d z"/>',
                    $parts[$i]->getBackColor(),
                    $position,
                    $badge->getBorderRadius(),
                    $badge->getHeight(),
                    $badge->getBorderRadius()
                );
            }

            $position += $widths[$i];
            $remainingWidth -= $this->calculateWidth($parts[$i]);
        }

        // Add the gradient:
        $result .= sprintf(
            '<rect rx="%d" x="%d" width="%d" height="%d" fill="url(#gradient)"/>',
            $radius,
            0,
            $totalWidth,
            $badge->getHeight()
        );

        return $result;
    }

    private function renderLabels(Badge $badge): string
    {
        $result = '';

        $x = 0;

        foreach ($badge->getParts() as $part) {
            $boxWidth = $this->calculateWidth($part);
            $y = $this->calculateTextYCoordinate($badge, $part);

            $result .= sprintf(
                '<text x="%d" y="%d" fill="%s" font-family="%s" font-size="%d" fill-opacity="%s">%s</text>',
                $x + ($boxWidth / 2),
                $y,
                '#010101',
                $part->getFont()->getName(),
                $part->getFont()->getSize(),
                '0.3',
                $part->getText()
            );

            $result .= sprintf(
                '<text x="%d" y="%d" fill="%s" font-family="%s" font-size="%d">%s</text>',
                $x + ($boxWidth / 2),
                $y - 1,
                $part->getForeColor(),
                $part->getFont()->getName(),
                $part->getFont()->getSize(),
                $part->getText()
            );

            $x += $boxWidth;
        }

        return '<g text-anchor="middle">' . $result . '</g>';
    }

    public function render(Badge $badge): string
    {
        $width = 0;
        $height = $badge->getHeight();

        // Render the boxes, this will also calculate the width of the badge:
        $boxesMarkup = $this->renderBoxes($badge, $width);

        $result = '';
        $result .= sprintf('<svg xmlns="http://www.w3.org/2000/svg" width="%d" height="%d">', $width, $height);

        $result .= '<linearGradient id="gradient" x2="0" y2="100%">';
        $result .= '<stop offset="0" stop-color="#bbb" stop-opacity=".1"/>';
        $result .= '<stop offset="1" stop-opacity=".1"/>';
        $result .= '</linearGradient>';

        $result .= $boxesMarkup;
        $result .= $this->renderLabels($badge);

        $result .= '</svg>';

        return $result;
    }
}
