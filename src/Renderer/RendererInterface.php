<?php

namespace PHP\Badge\Renderer;

use PHP\Badge\Badge;

interface RendererInterface
{
    public function render(Badge $badge);
}
