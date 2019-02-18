<?php

declare(strict_types=1);

namespace PHP\Badge\Font;

final class Font
{
    /** @var int */
    private $size;

    /** @var string */
    private $name;

    /** @var string */
    private $path;

    public function __construct(int $size, string $name, string $path)
    {
        $this->size = $size;
        $this->name = $name;
        $this->path = $path;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
