<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Serializer\Tests\Fixtures;

use Symfony\Component\Serializer\Annotation\EmbedProperties;

/**
 * @author Jibé Barth <barth.jib@gmail.com>
 */
class EmbedPropertiesDummy
{
    /**
     * @var \Symfony\Component\Serializer\Tests\Fixtures\EmbedPropertiesDummyChild
     * @EmbedProperties({"bar", "baz"})
     */
    public $foo;

    /**
     * @var string
     */
    public $simple;

    public function __construct()
    {
        $this->foo = new EmbedPropertiesDummyChild();
    }
}
