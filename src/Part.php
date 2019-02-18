<?php

declare(strict_types=1);

namespace PHP\Badge;

use PHP\Badge\Font\Font;

final class Part
{
    /** @var string */
    private $text;

    /** @var string */
    private $backColor;

    /** @var string */
    private $foreColor;

    /** @var Font */
    private $font;

    /** @var int|null */
    private $width;

    public function __construct(string $text, string $backColor, string $foreColor, Font $font, ?int $width = null)
    {
        $this->text = $text;
        $this->backColor = $backColor;
        $this->foreColor = $foreColor;
        $this->font = $font;
        $this->width = $width;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getBackColor(): string
    {
        return $this->backColor;
    }

    public function getForeColor(): string
    {
        return $this->foreColor;
    }

    public function getFont(): Font
    {
        return $this->font;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): void
    {
        $this->width = $width;
    }
}
