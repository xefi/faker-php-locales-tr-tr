<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+90';

    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    protected array $landlineFormats = [
        '2{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '3{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '4{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '5{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    /**
     * Generate a phone number; the international indicator is followed by the separator, the trunk 0 is not.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
