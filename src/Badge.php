<?php

declare(strict_types=1);

namespace PHP\Badge;

final class Badge
{
    /** @var int */
    private $borderRadius;

    /** @var int */
    private $height;

    /** @var Part[] */
    private $parts;

    public function __construct()
    {
        $this->borderRadius = 0;
        $this->height = 20;
        $this->parts = [];
    }

    public function getBorderRadius(): int
    {
        return $this->borderRadius;
    }

    public function setBorderRadius(int $borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function addPart(Part $part): void
    {
        $this->parts[] = $part;
    }

    /**
     * @return Part[]
     */
    public function getParts(): array
    {
        return $this->parts;
    }
}
