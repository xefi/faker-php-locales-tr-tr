<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\Extensions\PersonExtension;

final class PersonExtensionTest extends TestCase
{
    protected array $firstNameMale = [];
    protected array $firstNameFemale = [];
    protected array $lastName = [];
    protected array $titleMale = [];
    protected array $titleFemale = [];

    protected function setUp(): void
    {
        parent::setUp();

        $personExtension = new \Xefi\Faker\TrTr\Extensions\PersonExtension(new Randomizer());
        $reflection = new ReflectionClass($personExtension);

        $this->firstNameMale = $reflection->getProperty('firstNameMale')->getValue($personExtension);
        $this->firstNameFemale = $reflection->getProperty('firstNameFemale')->getValue($personExtension);
        $this->lastName = $reflection->getProperty('lastName')->getValue($personExtension);
        $this->titleMale = $reflection->getProperty('titleMale')->getValue($personExtension);
        $this->titleFemale = $reflection->getProperty('titleFemale')->getValue($personExtension);
    }

    public function testFirstNameFemale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->firstNameFemale); $i++) {
            $results[] = $this->faker->unique()->firstName(PersonExtension::GENDER_FEMALE);
        }

        $this->assertEqualsCanonicalizing($this->firstNameFemale, $results);
    }

    public function testFirstNameMale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->firstNameMale); $i++) {
            $results[] = $this->faker->unique()->firstName(PersonExtension::GENDER_MALE);
        }

        $this->assertEqualsCanonicalizing($this->firstNameMale, $results);
    }

    public function testFirstName(): void
    {
        $firstNames = array_unique(array_merge($this->firstNameMale, $this->firstNameFemale));

        $results = [];
        for ($i = 0; $i < count($firstNames); $i++) {
            $results[] = $this->faker->unique()->firstName();
        }

        $this->assertEqualsCanonicalizing($firstNames, $results);
    }

    public function testLastName(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->lastName); $i++) {
            $results[] = $this->faker->unique()->lastName();
        }

        $this->assertEqualsCanonicalizing($this->lastName, $results);
    }

    public function testNameMale(): void
    {
        for ($i = 0; $i < 100; $i++) {
            [$firstName, $lastName] = explode(' ', $this->faker->name(PersonExtension::GENDER_MALE));

            $this->assertContains($firstName, $this->firstNameMale);
            $this->assertContains($lastName, $this->lastName);
        }
    }

    public function testNameFemale(): void
    {
        for ($i = 0; $i < 100; $i++) {
            [$firstName, $lastName] = explode(' ', $this->faker->name(PersonExtension::GENDER_FEMALE));

            $this->assertContains($firstName, $this->firstNameFemale);
            $this->assertContains($lastName, $this->lastName);
        }
    }

    public function testName(): void
    {
        for ($i = 0; $i < 100; $i++) {
            [$firstName, $lastName] = explode(' ', $this->faker->name());

            $this->assertContains($firstName, array_merge($this->firstNameMale, $this->firstNameFemale));
            $this->assertContains($lastName, $this->lastName);
        }
    }

    public function testTitleFemale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->titleFemale); $i++) {
            $results[] = $this->faker->unique()->title(PersonExtension::GENDER_FEMALE);
        }

        $this->assertEqualsCanonicalizing($this->titleFemale, $results);
    }

    public function testTitleMale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->titleMale); $i++) {
            $results[] = $this->faker->unique()->title(PersonExtension::GENDER_MALE);
        }

        $this->assertEqualsCanonicalizing($this->titleMale, $results);
    }

    public function testTitle(): void
    {
        $titles = array_unique(array_merge($this->titleFemale, $this->titleMale));

        $results = [];
        for ($i = 0; $i < count($titles); $i++) {
            $results[] = $this->faker->unique()->title();
        }

        $this->assertEqualsCanonicalizing($titles, $results);
    }

    public function testTcKimlikNoChecksumValidatorAcceptsAKnownNumber(): void
    {
        $this->assertTrue($this->isValidTcKimlikNo('10000000146'));
        $this->assertFalse($this->isValidTcKimlikNo('10000000147'));
    }

    public function testTcKimlikNo(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $number = $this->faker->tcKimlikNo();

            $this->assertMatchesRegularExpression('/^[1-9]\d{10}$/', $number);
            $this->assertTrue($this->isValidTcKimlikNo($number));
        }
    }

    private function isValidTcKimlikNo(string $number): bool
    {
        $d = array_map('intval', str_split($number));

        $tenth = ((($d[0] + $d[2] + $d[4] + $d[6] + $d[8]) * 7 - ($d[1] + $d[3] + $d[5] + $d[7])) % 10 + 10) % 10;
        $eleventh = array_sum(array_slice($d, 0, 10)) % 10;

        return $d[0] !== 0 && $tenth === $d[9] && $eleventh === $d[10];
    }
}
