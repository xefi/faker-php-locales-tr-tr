<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    /**
     * Return a Turkish IBAN: 5-digit bank code, a reserved 0 digit and a 16-digit account number.
     *
     * @param string|null $countryCode
     * @param string|null $format
     *
     * @return string
     */
    public function iban(?string $countryCode = 'TR', ?string $format = null): string
    {
        if ($format === null) {
            $format = sprintf(
                '000%s0%s',
                str_repeat('{d}', 2),
                str_repeat('{d}', 16)
            );
        }

        return parent::iban($countryCode, $format);
    }
}
