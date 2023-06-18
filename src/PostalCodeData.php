<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\PostalCode\PHP;

use BeastBytes\PostalCode\PostalCodeDataInterface;
use InvalidArgumentException;

final class PostalCodeData implements PostalCodeDataInterface
{
    public const COUNTRY_NOT_FOUND_EXCEPTION_MESSAGE =
        'Country {country} not found in list of postal code formats';
    public const INVALID_DATA_EXCEPTION_MESSAGE
        = '`$postalCodeData` must be an array of postal code data, a path to a file that returns an array of postal code data, or `null` to use local data';
    public function __construct(private array|string|null $postalCodeData = null)
    {
        if ($this->postalCodeData === null) {
            $this->postalCodeData = require dirname(__DIR__) . '/data/data.php';
        } elseif (is_string($this->postalCodeData)) {
            $this->postalCodeData = require $this->postalCodeData;
        }

        if (!is_array($this->postalCodeData) || count($this->postalCodeData) === 0) {
            throw new InvalidArgumentException(self::INVALID_DATA_EXCEPTION_MESSAGE);
        }
    }

    public function getCountries(): array
    {
        return array_keys($this->postalCodeData);
    }

    public function getPattern(string $country): string
    {
        if ($this->hasCountry($country)) {
            return $this->postalCodeData[$country];
        }

        throw new InvalidArgumentException(strtr(
            self::COUNTRY_NOT_FOUND_EXCEPTION_MESSAGE,
            ['{country}' => $country]
        ));
    }

    public function hasCountry(string $country): bool
    {
        return array_key_exists($country, $this->postalCodeData);
    }
}
