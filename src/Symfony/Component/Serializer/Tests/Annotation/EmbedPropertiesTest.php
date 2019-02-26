<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Serializer\Tests\Annotation;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Annotation\EmbedProperties;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;

/**
 * @author Jibé Barth <barth.jib@gmail.com>
 */
class EmbedPropertiesTest extends TestCase
{
    public function testEmptyEmbedPropertiesParameter()
    {
        $this->expectException(InvalidArgumentException::class);
        new EmbedProperties(['value' => []]);
    }

    public function testNotAnArrayEmbedPropertiesParameter()
    {
        $this->expectException(InvalidArgumentException::class);
        new EmbedProperties(['value' => 12]);
    }

    public function testInvalidEmbedPropertiesParameter()
    {
        $this->expectException(InvalidArgumentException::class);
        new EmbedProperties(['value' => ['a', 1, new \stdClass()]]);
    }

    public function testEmbedPropertiesParameters()
    {
        $validData = ['a', 'b'];

        $embedProperties = new EmbedProperties(['value' => $validData]);
        $this->assertEquals($validData, $embedProperties->getEmbedProperties());
    }
}
