<?php

namespace PHP\Badge\Renderer;

use PHP\Badge\Badge;
use PHP\Badge\Font\WidthCalculatorInterface;
use PHP\Badge\Part;
use PHP\Badge\Renderer\RendererInterface;

class SvgRenderer implements RendererInterface
{
    private $widthCalculator;

    public function __construct(WidthCalculatorInterface $widthCalculator)
    {
        $this->widthCalculator = $widthCalculator;
    }

    private function calculateWidth(Part $part)
    {
        $textWidth = $this->widthCalculator->getWidth($part->getText(), $part->getFont()) + 10;
        if (!$part->getWidth()) {
            $width = $textWidth;
        } else {
            $width = $part->getWidth();
        }

        return $width;
    }

    private function calculateBoxWidths(Badge $badge)
    {
        $widths = array();

        foreach ($badge->getParts() as $part) {
            $widths[] = $this->calculateWidth($part);
        }

        return $widths;
    }

    private function renderBoxes(Badge $badge, &$totalWidth)
    {
        $result = '';

        // Calculate the widths:
        $widths = $this->calculateBoxWidths($badge);
        $totalWidth = array_sum($widths);

        // The radius of the badge:
        $radius = $badge->getBorderRadius();

        $position = 0;
        $remainingWidth = $totalWidth;

        $parts = $badge->getParts();
        for ($i = 0; $i < count($parts); ++$i) {
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
                    '<path fill="%s" d="M%d 0 h4 v20 h-4 z"/>',
                    $parts[$i]->getBackColor(),
                    $position
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
            20
        );

        return $result;
    }

    private function renderLabels(Badge $badge)
    {
        $result = '';

        $x = 0;
        $y = 15;

        foreach ($badge->getParts() as $part) {
            $boxWidth = $this->calculateWidth($part);

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

    public function render(Badge $badge)
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
