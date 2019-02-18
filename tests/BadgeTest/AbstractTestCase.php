<?php

namespace PHP\BadgeTest;

use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_Exception;

abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{
    public function assertNumberWithinInclusiveBounds($lower, $upper, $actual)
    {
        if (!is_numeric($lower)) {
            throw new PHPUnit_Framework_Exception('Lower value must be a number');
        }
        if (!is_numeric($upper)) {
            throw new PHPUnit_Framework_Exception('Upper value must be a number');
        }
        if (!is_numeric($actual)) {
            throw new PHPUnit_Framework_Exception('Value being tested must be a number');
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
