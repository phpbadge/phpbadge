<?php

namespace PHP\BadgeTest;

use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    public function assertNumberWithinInclusiveBounds($lower, $upper, $actual)
    {
        if (!is_numeric($lower)) {
            throw new Exception('Lower value must be a number');
        }

        if (!is_numeric($upper)) {
            throw new Exception('Upper value must be a number');
        }

        if (!is_numeric($actual)) {
            throw new Exception('Value being tested must be a number');
        }

        $this->assertThat(
            $actual,
            $this->logicalAnd(
                $this->greaterThanOrEqual($lower),
                $this->lessThanOrEqual($upper)
            ),
            sprintf(
                "Value '%s' is not between values %s, %s (inclusive)",
                $actual,
                $lower,
                $upper
            )
        );
    }
}
