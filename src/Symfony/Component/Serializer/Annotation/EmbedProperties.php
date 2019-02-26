<?php
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Serializer\Annotation;

use Symfony\Component\Serializer\Exception\InvalidArgumentException;

/**
 * Annotation class for @EmbedProperties().
 *
 * @Annotation
 * @Target({"PROPERTY"})
 *
 * @author Jibé Barth <barth.jib@gmail.com>
 */
final class EmbedProperties
{
    /**
     * @var string[]
     */
    private $embedProperties;

    public function __construct(array $data)
    {
        if (!isset($data['value'])) {
            throw new InvalidArgumentException(sprintf('Parameter of annotation "%s" should be set.', \get_class($this)));
        }
        if (!\is_array($data['value']) || empty($data['value'])) {
            throw new InvalidArgumentException(sprintf('Parameter of annotation "%s" must be a non-empty array.', \get_class($this)));
        }
        foreach ($data['value'] as $property) {
            if (!\is_string($property)) {
                throw new InvalidArgumentException(sprintf('Parameter of annotation "%s" must be an array of string.', \get_class($this)));
            }
        }
        $this->embedProperties = $data['value'];
    }

    public function getEmbedProperties(): array
    {
        return $this->embedProperties;
    }
}
