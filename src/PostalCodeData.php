<?php
/**
 * @copyright Copyright © 2022 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\PostalCode\PHP;

use BeastBytes\PostalCode\PostalCodeDataInterface;
use InvalidArgumentException;

final class PostalCodeData implements PostalCodeDataInterface
{
    public function __construct(private array|string|null $postalCodes = null)
    {
        if ($this->postalCodes === null) {
            $this->postalCodes = require 'postalCodes.php';
        } elseif (is_string($this->postalCodes)) {
            $this->postalCodes = require $this->postalCodes;
        }

        if (!is_array($this->postalCodes)) {
            throw new InvalidArgumentException('`$postalCodes` must be an array of Postal Code formats, a path to a file that returns an array of Postal Code formats, or `null` to use local data');
        }
    }

    public function getCountries(): array
    {
        return array_keys($this->postalCodes);
    }

    public function getPattern(string $country): string
    {
        if ($this->hasCountry($country)) {
            return $this->postalCodes[$country];
        }

        throw new InvalidArgumentException(strtr(
            'Country "{country}" not found in list of Postal Codes',
            ['{country}' => $country]
        ));
    }

    public function hasCountry(string $country): bool
    {
        return array_key_exists($country, $this->postalCodes);
    }
}
