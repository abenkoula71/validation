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
 * Class RulesGroup.
 *
 * @package validation
 */
abstract class RulesGroup
{
    /**
     * Gets the rules of the group.
     *
     * @param array $options Custom options to allow internal logics
     *
     * @return array<string,array|RuleCollectionInterface|string>
     */
    abstract public static function getRules(array $options = []) : array;

    public static function getMessages(array $options = []) : array
    {
        return [];
    }

    public static function getLabels(array $options = []) : array
    {
        return [];
    }
}
