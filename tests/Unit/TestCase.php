<?php

namespace Xefi\Faker\TrTr\Tests\Unit;

use Xefi\Faker\Container\Container;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        $this->faker = (new Container(false))->locale('tr_TR');
    }
}
