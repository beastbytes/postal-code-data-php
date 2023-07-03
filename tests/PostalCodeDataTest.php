<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\PostalCode\PHP\Tests;

use BeastBytes\PostalCode\PHP\PostalCodeData;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class PostalCodeDataTest extends TestCase
{
    private static string $dataFilename;
    private static array $postalCodeData;
    private static PostalCodeData $testClass;

    #[BeforeClass]
    public static function init(): void
    {
        self::$testClass = new PostalCodeData();
        self::$dataFilename = dirname(__DIR__) . '/data/data.php';
    }

    public function test_constructor_with_null()
    {
        $postalCodeData = new PostalCodeData();
        $this->assertCount(
            count(require self::$dataFilename),
            $postalCodeData->getCountries()
        );
    }

    public function test_constructor_with_string()
    {
        $postalCodeData = new PostalCodeData(
            self::$dataFilename
        );
        $this->assertCount(
            count(require self::$dataFilename),
            $postalCodeData->getCountries()
        );
    }

    public function test_constructor_with_array()
    {
        $data = $this->getData();

        $postalCodeData = new PostalCodeData($data);
        $this->assertCount(
            count($data),
            $postalCodeData->getCountries()
        );
    }

    #[DataProvider('badDataProvider')]
    public function test_bad_constructor($data)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(PostalCodeData::INVALID_DATA_EXCEPTION_MESSAGE);
        new PostalCodeData(__DIR__ . "/data/$data.php");
    }

    #[DataProvider('goodCountryProvider')]
    public function test_has_country($country)
    {
        $this->assertTrue(self::$testClass->hasCountry($country));
    }

    #[DataProvider('badCountryProvider')]
    public function test_does_not_have_country($country)
    {
        $this->assertFalse(self::$testClass->hasCountry($country));
    }

    #[DataProvider('goodCountryProvider')]
    public function test_get_pattern($country)
    {
        $this->assertSame(self::$postalCodeData[$country], self::$testClass->getPattern($country));
    }

    #[DataProvider('badCountryProvider')]
    public function test_bad_countries_pattern($country)
    {
        $this->assertFalse(self::$testClass->hasCountry($country));

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(strtr(
            PostalCodeData::COUNTRY_NOT_FOUND_EXCEPTION_MESSAGE,
            [
                '{country}' => $country
            ]
        ));
        self::$testClass->getPattern($country);
    }

    public static function goodCountryProvider(): \Generator
    {
        self::$postalCodeData = require dirname(__DIR__) . '/data/data.php';

        foreach (array_keys(self::$postalCodeData) as $country) {
            yield $country => [$country];
        }
    }

    public static function badCountryProvider(): \Generator
    {
        foreach (
            [
                'non-existent code' => ['XX'],
                'alpha-3 code' => ['GBR'],
                'too short' => ['G'],
                'too long' => ['GBRT'],
                'number string' => ['12']
            ] as $name => $data
        ) {
            yield $name => $data;
        }
    }

    public static function badDataProvider(): \Generator
    {
        foreach (
            [
                'null',
                'string'
            ] as $name
        ) {
            yield $name => [$name];
        }
    }

    private function getData(): array
    {
        $data = [];

        self::$postalCodeData = require dirname(__DIR__) . '/data/data.php';
        $countries = array_rand(self::$postalCodeData, random_int(1, count(self::$postalCodeData)));

        foreach ($countries as $country) {
            $data[$country] = self::$postalCodeData[$country];
        }

        return $data;
    }
}
