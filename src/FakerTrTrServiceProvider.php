<?php

namespace Xefi\Faker\TrTr;

use Xefi\Faker\TrTr\Extensions\AddressExtension;
use Xefi\Faker\TrTr\Extensions\ColorsExtension;
use Xefi\Faker\TrTr\Extensions\CompanyExtension;
use Xefi\Faker\TrTr\Extensions\FinancialExtension;
use Xefi\Faker\TrTr\Extensions\PersonExtension;
use Xefi\Faker\TrTr\Extensions\PhoneExtension;
use Xefi\Faker\TrTr\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerTrTrServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}
