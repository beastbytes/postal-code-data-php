<?php
/**
 * @copyright Copyright © 2022 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace Tests;

use BeastBytes\PostalCode\PHP\PostalCodeData;
use PHPUnit\Framework\TestCase;

class PostalCodeDataTest extends TestCase
{
    private static array $goodCountries = [];
    private static array $postalCodes = [];
    private static PostalCodeData $testClass;

    /**
     * @beforeClass
     */
    public static function init(): void
    {
        self::$postalCodes = require dirname(__DIR__) . '/src/data.php';
        self::$testClass = new PostalCodeData();

    }

    public function test_getting_countries()
    {
        $this->assertCount(count(self::$goodCountries), self::$testClass->getCountries());
    }

    /**
     * @dataProvider goodCountries
     */
    public function test_has_country($country)
    {
        $this->assertTrue(self::$testClass->hasCountry($country));
    }

    /**
     * @dataProvider badCountries
     */
    public function test_does_not_have_country($country)
    {
        $this->assertFalse(self::$testClass->hasCountry($country));
    }

    /**
     * @dataProvider goodCountries
     */
    public function test_get_pattern($country)
    {
        $this->assertSame(self::$postalCodes[$country], self::$testClass->getPattern($country));
    }

    /**
     * @dataProvider badCountries
     */
    public function test_bad_countries($country)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Country \"$country\" not found in list of Postal Codes");
        self::$testClass->getPattern($country);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Country \"$country\" not found in list of Postal Codes");
        self::$testClass->getFields($country);
    }

    public function goodCountries(): array
    {
        $postalCodes = require dirname(__DIR__) . '/src/data.php';
        $goodCountries = [];

        foreach (array_keys($postalCodes) as $country) {
            $goodCountries[] = [$country];
        }

        self::$goodCountries = $goodCountries;
        return self::$goodCountries;
    }

    public function badCountries(): array
    {
        return [
            'non-existent code' => ['XX'],
            'alpha-3 code' => ['GBR'],
            'too short' => ['G'],
            'too long' => ['GBRT'],
            'number string' => ['12']
        ];
    }
}
