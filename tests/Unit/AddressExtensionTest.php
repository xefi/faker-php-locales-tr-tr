<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\TrTr\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected array $provinces = [];
    protected array $cities = [];
    protected array $streetTypes = [];
    protected array $streetNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $extension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($extension);

        $this->provinces = $reflection->getProperty('provinces')->getValue($extension);
        $this->cities = $reflection->getProperty('cities')->getValue($extension);
        $this->streetTypes = $reflection->getProperty('streetTypes')->getValue($extension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($extension);
    }

    public function testProvincesCoverEveryPlateCode(): void
    {
        $this->assertCount(81, $this->provinces);
        $this->assertSame(range(1, 81), array_map('intval', array_keys($this->provinces)));
    }

    public function testProvince(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->provinces); $i++) {
            $results[] = $this->faker->unique()->province();
        }

        $this->assertEqualsCanonicalizing(array_values($this->provinces), $results);
    }

    public function testProvinceCode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $code = $this->faker->provinceCode();

            $this->assertMatchesRegularExpression('/^(0[1-9]|[1-7]\d|8[01])$/', $code);
        }
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing($this->cities, $results);
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $postcode = $this->faker->postcode();

            $this->assertMatchesRegularExpression('/^\d{5}$/', $postcode);
            $this->assertArrayHasKey(substr($postcode, 0, 2), $this->provinces);
        }
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->houseNumber();

            $this->assertIsInt($result);
            $this->assertGreaterThanOrEqual(1, $result);
            $this->assertLessThanOrEqual(200, $result);
        }
    }

    public function testStreetName(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->streetName();
            $type = substr($result, strrpos($result, ' ') + 1);
            $name = substr($result, 0, strrpos($result, ' '));

            $this->assertContains($type, $this->streetTypes);
            $this->assertContains($name, $this->streetNames);
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[\p{L} ]+ (Caddesi|Sokak|Bulvarı) No: \d{1,3}$/u', $this->faker->streetAddress());
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->fullAddress();

            $this->assertMatchesRegularExpression('/^[\p{L} ]+ (Caddesi|Sokak|Bulvarı) No: \d{1,3} Daire: \d{1,2}, (\d{5}) ([\p{L} ]+)$/u', $result);

            preg_match('/, (\d{2})\d{3} ([\p{L} ]+)$/u', $result, $matches);
            $this->assertSame($this->provinces[$matches[1]], $matches[2]);
        }
    }
}
