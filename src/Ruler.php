<?php declare(strict_types=1);
/*
 * This file is part of Aplus Framework Validation Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Framework\Validation;

/**
 * Class Ruler.
 *
 * @package validation
 */
class Ruler
{
    /**
     * Creates a RuleCollection.
     *
     * @return RuleCollection
     */
    public static function create() : RuleCollection
    {
        return new RuleCollection();
    }
}
