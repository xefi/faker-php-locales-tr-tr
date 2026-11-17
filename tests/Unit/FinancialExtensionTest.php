<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

use Xefi\Faker\Calculators\Iban;

final class FinancialExtensionTest extends TestCase
{
    public function testIban(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $iban = $this->faker->iban();

            $this->assertEquals(26, strlen($iban));
            $this->assertMatchesRegularExpression('/^TR\d{2}000\d{2}0\d{16}$/', $iban);
            $this->assertTrue(Iban::isValid($iban));
        }
    }
}
