<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\TrTr\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testCompaniesHaveALegalForm(): void
    {
        foreach ($this->companies as $company) {
            $this->assertMatchesRegularExpression('/ (A\.Ş\.|Ltd\. Şti\.)$/u', $company);
        }
    }

    public function testVknChecksumValidatorAcceptsKnownNumbers(): void
    {
        $this->assertTrue($this->isValidVkn('1234567890'));
        $this->assertTrue($this->isValidVkn('4840847211'));
        $this->assertFalse($this->isValidVkn('1234567891'));
    }

    public function testVkn(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $vkn = $this->faker->vkn();

            $this->assertMatchesRegularExpression('/^\d{10}$/', $vkn);
            $this->assertTrue($this->isValidVkn($vkn));
        }
    }

    private function isValidVkn(string $vkn): bool
    {
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $shifted = ((int) $vkn[$i] + 9 - $i) % 10;
            $value = ($shifted * (2 ** (9 - $i))) % 9;
            if ($shifted !== 0 && $value === 0) {
                $value = 9;
            }
            $sum += $value;
        }

        return (10 - $sum % 10) % 10 === (int) $vkn[9];
    }
}
