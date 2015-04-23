<?php

namespace PHP\Badge\Font;

interface WidthCalculatorInterface
{
    public function getWidth($text, Font $font);
}
