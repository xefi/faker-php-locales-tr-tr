<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\TrTr\Extensions\TextExtension;

final class TextExtensionTest extends TestCase
{
    protected array $paragraphs = [];

    protected function setUp(): void
    {
        parent::setUp();

        $textExtension = new TextExtension(new Randomizer());
        $this->paragraphs = (new ReflectionClass($textExtension))->getProperty('paragraphs')->getValue($textExtension);
    }

    public function testWords(): void
    {
        $sentences = array_merge(...$this->paragraphs);
        $words = array_merge(...$sentences);
        $result = $this->faker->words(count($words));

        $result = preg_split('/\s+/u', $result);
        $words = array_map(function ($word) { return mb_strtolower(str_replace(['I', 'İ'], ['ı', 'i'], preg_replace('/[.,]/', '', $word)), 'UTF-8'); }, $words);

        $this->assertEqualsCanonicalizing(
            $words,
            $result
        );
    }

    public function testWordsFollowTurkishLowercaseRules(): void
    {
        $sentences = array_merge(...$this->paragraphs);
        $result = $this->faker->words(count(array_merge(...$sentences)));

        $this->assertDoesNotMatchRegularExpression('/[A-ZÇĞİÖŞÜ]/u', $result);
        $this->assertStringNotContainsString("\u{0307}", $result);
        $this->assertStringContainsString('işletmeler', $result);
        $this->assertStringContainsString('çalışanlar', $result);
    }

    public function testSentences(): void
    {
        $sentences = array_map(fn (array $sentence) => implode(' ', $sentence), array_merge(...$this->paragraphs));

        for ($i = 0; $i < 20; $i++) {
            $this->assertContains($this->faker->sentences(1), $sentences);
        }
    }
}
