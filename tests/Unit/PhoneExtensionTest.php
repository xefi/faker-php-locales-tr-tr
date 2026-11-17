<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0[2345]\d{9}$/', $this->faker->phoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^05\d{9}$/', $this->faker->cellPhoneNumber());
            $this->assertMatchesRegularExpression('/^05\d{2} \d{3} \d{2} \d{2}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0[234]\d{2} \d{3} \d{2} \d{2}$/', $this->faker->spacedLandlinePhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+90[2345]\d{9}$/', $this->faker->indicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+90 [2345]\d{2} \d{3} \d{2} \d{2}$/', $this->faker->spacedIndicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+90 5\d{2} \d{3} \d{2} \d{2}$/', $this->faker->spacedIndicatoredCellPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+90-[234]\d{2}-\d{3}-\d{2}-\d{2}$/', $this->faker->dashedIndicatoredLandlinePhoneNumber());
        }
    }
}
