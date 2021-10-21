<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

<<<<<<< Updated upstream
use phpDocumentor\Reflection\PseudoType;
use phpDocumentor\Reflection\Type;

=======
>>>>>>> Stashed changes
/**
 * Value Object representing a array-key Type.
 *
 * A array-key Type is the supertype (but not a union) of int and string.
 *
 * @psalm-immutable
 */
<<<<<<< Updated upstream
final class ArrayKey extends AggregatedType implements PseudoType
=======
final class ArrayKey extends AggregatedType
>>>>>>> Stashed changes
{
    public function __construct()
    {
        parent::__construct([new String_(), new Integer()], '|');
    }

<<<<<<< Updated upstream
    public function underlyingType(): Type
    {
        return new Compound([new String_(), new Integer()]);
    }

=======
>>>>>>> Stashed changes
    public function __toString(): string
    {
        return 'array-key';
    }
}
