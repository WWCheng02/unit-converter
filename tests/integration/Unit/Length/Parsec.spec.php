<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\Length;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\Length\Metre;
use UnitConverter\Unit\Length\Parsec;
use UnitConverter\UnitConverter;

/**
 * Ensure that a parsec is infact, a parsec.
 *
 * @covers UnitConverter\Unit\Length\Parsec
 * @uses UnitConverter\Unit\Length\Metre
 * @uses UnitConverter\Unit\AbstractUnit
 * @uses UnitConverter\UnitConverter
 * @uses UnitConverter\Calculator\SimpleCalculator
 * @uses UnitConverter\Calculator\AbstractCalculator
 * @uses UnitConverter\Calculator\Formula\AbstractFormula
 * @uses UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses UnitConverter\Registry\UnitRegistry
 * @uses UnitConverter\Support\ArrayDotNotation
 * @uses UnitConverter\Support\Collection
 */
class ParsecSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Metre(),
                new Parsec(),
            ]),
            new SimpleCalculator()
        );
    }

    protected function tearDown()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1ParsecIs30856775814913672decimal789139379577965Metres()
    {
        $expected = 30856775814913672.789139379577965;
        $actual = $this->converter
            ->convert(1, 15)
            ->from("pc")
            ->to("m");

        $this->assertEquals($expected, $actual);
    }
}
