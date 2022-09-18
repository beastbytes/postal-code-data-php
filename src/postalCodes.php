<?php
/**
 * @copyright Copyright © 2022 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

/**
 * National postal code regex patterns indexed by
 * {@link http://en.wikipedia.org/wiki/ISO_3166-1#Current_codes ISO 3166-1 alpha-2 country code}
 */
return [
    'AD' => '/^AD[1-7]00$/', // Andorra
    'AL' => '/^\d{4}$/', // Albania
    'AM' => '/^\d{4}$/', // Armenia
    'AR' => '/[A-Z]\d{4}[A-Z]{3}$/', // Argentina
    'AT' => '/^\d{4}$/', // Austria
    'AU' => '/^\d{4}$/', // Australia
    'AZ' => '/^AZ\d{4}$/', // Azerbaijan
    'BB' => '/^BB\d{5}$/', // Barbados
    'BE' => '/^\d{4}$/', // Belgium
    'BG' => '/^[1-9]\d{3}$/', // Bulgaria
    'BN' => '/^[BKPT][A-Z]\d{4}$/', // Brunei
    'BR' => '/^\d{5}(\-\d{3})?$/', // Brazil
    'CA' => '/^[ABCEGHJKLMNPRSTVXY][0-9][A-Z] [0-9][A-Z][0-9]$/', // Canada
    'CH' => '/^[1-9]\d{3}$/', // Switzerland
    'CL' => '/^[1-9]\d{2}\-\d{4}$/', // Chile
    'CO' => '/^\d{6}$/', // Colombia
    'CR' => '/^\d{5}(\-\d{4})?$/', // Costa Rica
    'CY' => '/^([1-9]|99)\d{3}$/', // Cyprus
    'CZ' => '/^[1-7]\d{2} \d{2}$/', // Czech Republic
    'DE' => '/^\d{5}$/', // Germany
    'DK' => '/^[1-9]\d{3}$/', // Denmark
    'DO' => '/^\d{5}$/', // Dominican Republic
    'DZ' => '/^\d{5}$/', // Algeria
    'EC' => '/^\d{6}$/', // Ecuador
    'EE' => '/^\d{5}$/', // Estonia
    'EG' => '/^\d{5}$/', // Egypt
    'ES' => '/^\d{5}$/', // Spain
    'FI' => '/^\d{5}$/', // Finland
    'FK' => '/^FIQQ 1ZZ$/', // Falkland Islands
    'FO' => '/^FO\-\d{3}$/', // Faroe Islands
    'FR' => '/^\d{5}$/', // France
    'GB' => '/^(?:(?:[A-PR-UWYZ][0-9]{1,2}|[A-PR-UWYZ][A-HK-Y][0-9]{1,2}|[A-PR-UWYZ][0-9][A-HJKSTUW]|[A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRV-Y]) [0-9][ABD-HJLNP-UW-Z]{2}|GIR 0AA)$/',
    'GG' => '/^GY[0-9]{1,2} [0-9][ABD-HJLNP-UW-Z]{2}$/', // Guernsey (GB postal code format)
    'GH' => '/^[A-Z][A-Z\d]\d{3,5}$/', // Ghana
    'GI' => '/^GX11 1AA$/', // Gibraltar
    'GR' => '/^\d{2} \d{2}$/', // Greece
    'GS' => '/^SIQQ 1ZZ$/', // South Georgia and the South Sandwich Islands
    'GT' => '/^\d{5}$/', // Guatemala
    'HU' => '/^[1-9]\d{3}$/', // Hungary
    'ID' => '/^[1-9]\d{4}$/', // Indonesia
    'IE' => '/^(D6W|[AC-FHKNPRTV-Y][0-9]{2}) [AC-FHKNPRTV-Y0-9]{4}$/', // Ireland
    'IL' => '/^\d{7}$/', // Israel
    'IM' => '/^IM[0-9]{1,2} [0-9][ABD-HJLNP-UW-Z]{2}$/', // Isle of Man (GB postal code format)
    'IN' => '/^\d{3} \d{3}$/', // India
    'IO' => '/BBND 1ZZ$/', // British Indian Ocean Territory
    'IQ' => '/^((10)|(31)|(32)|(34)|(36)|(41)|(42)|(44)|(46)|(51)|(52)|(54)|(56)|(58)|(61)|(62)|(64)|(66))\d{3}$/', // Iraq
    'IT' => '/^\d{5}$/', // Italy
    'JE' => '/^JE[0-9]{1,2} [0-9][ABD-HJLNP-UW-Z]{2}$/', // Jersey (GB postal code format)
    'JP' => '/^\d{3}\-\d{4}$/', // Japan
    'KR' => '/^\d{5}$/', // South Korea
    'LK' => '/^\d{5}$/', // Sri Lanka
    'LT' => '/^LT\-\d{5}$/', // Lithuania
    'LU' => '/^[1-9]\d{4}$/', // Luxembourg
    'LV' => '/^LV\-\d{4}$/', // Latvia
    'MD' => '/^MD\-\d{4}$/', // Moldova
    'ME' => '/^\d{5}$/', // Montenegro
    'MK' => '/^[1-7]\d{3}$/', // Macedonia
    'MM' => '/^\d{5}$/', // Myanmar
    'MS' => '/^MSR1[123][1235]0$/', // Montserrat
    'MT' => '/^[A-Z]{2,3} \d{4}$/', // Malta
    'MU' => '/^[AR1-9]\d{4}$/', // Mauritius
    'MX' => '/^\d{5}$/', // Mexico
    'MY' => '/^\d{5}$/', // Malaysia
    'NG' => '/^\d{6}$/', // Nigeria
    'NI' => '/^[1-9]\d{4}$/', // Nicaragua
    'NL' => '/^\d{3} [A-Z]{2}$/', // Netherlands
    'NO' => '/^\d{4}$/', // Norway
    'NZ' => '/^\d{4}$/', // New Zealand
    'PA' => '/^[01]\d{3}$/', // Panama
    'PE' => '/^\d{5}$/', // Peru
    'PH' => '/^\d{4}$/', // Philippines
    'PK' => '/^\d{5}$/', // Pakistan
    'PL' => '/^\d{2}\-\d{3}$/', // Poland
    'PN' => '/PCRN 1ZZ$/', // Pitcairn Islands
    'PR' => '/^00[679]\d{2}(?:[- ]\d{4})?$/', // Puerto Rico
    'PT' => '/^\d{4}\-\d{3}$/', // Portugal
    'PY' => '/^\d{4}$/', // Paraguay
    'RO' => '/^\d{6}$/', // Romania
    'RS' => '/^[123]\d{4}$/', // Serbia
    'RU' => '/^\d{6}$/', // Russia
    'SA' => '/^\d{5}\-\d{4}$/', // Saudi Arabia
    'SE' => '/^SE\-\d{3}\-\d{2}$/', // Sweden
    'SG' => '/^\d{6}$/', // Singapore
    'SH' => '/(STHL 1ZZ)|(ASCN 1ZZ)|(TDCU 1ZZ)$/', // Saint Helena, Ascension and Tristan da Cunha
    'SI' => '/^\d{4}$/', // Slovenia
    'SK' => '/^[890]\d{2} \d{2}$/', // Slovakia
    'TC' => '/TKCA 1ZZ$/', // Turks and Caicos Islands
    'TH' => '/^[1-9]\d{4}$/', // Thailand
    'TN' => '/^[1-9]\d{3}$/', // Tunisia
    'TR' => '/^\d{5}$/', // Turkey
    'TW' => '/^[1-9]\d{2}(\d{3})?$/', // Taiwan
    'UA' => '/^\d{5}$/', // Ukraine
    'US' => '/^\d{5}(?:[- ]\d{4})?$/', // United States of America
    'UY' => '/^\d{5}$/', // Uruguay
    'VE' => '/^\d{4}(\-[A-Z])?$/', // Venezuela
    'VI' => '/^008\d{2}(?:[- ]\d{4})?$/', // United States Virgin Islands
    'VN' => '/^\d{5}$/', // Vietnam
    'XK' => '/^[1-7]00\d{2}$/', // Kosovo NOTE: XK is a temporary code used until ISO assign a permanent code
    'ZA' => '/^\d{4}$/', // South Africa
];
