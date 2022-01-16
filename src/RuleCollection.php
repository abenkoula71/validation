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
 * Class RuleCollection.
 *
 * @package validation
 */
class RuleCollection implements RuleCollectionInterface, \JsonSerializable
{
    /**
     * @var array<string,array<mixed>>
     */
    protected array $rules = [];

    public function __toString() : string
    {
        $string = '';
        foreach ($this->getRules() as $rule => $args) {
            if ($string !== '') {
                $string .= '|';
            }
            foreach ($args as &$arg) {
                $arg = \strtr((string) $arg, [',' => '\,']);
            }
            unset($arg);
            $args = $args
                ? ':' . \implode(',', $args)
                : '';
            $string .= $rule . $args;
        }
        return $string;
    }

    /**
     * Gets the added rules.
     *
     * @return \mixed[][]
     */
    public function getRules() : array
    {
        return $this->rules;
    }

    /**
     * Add rule to validate a datetime format.
     *
     * @param string $format
     *
     * @see Validator::datetime()
     *
     * @return static
     */
    public function datetime(string $format = 'Y-m-d H:i:s') : static
    {
        $this->rules['datetime'] = [$format];
        return $this;
    }

    /**
     * Add rule to validate email.
     *
     * @see Validator::email()
     *
     * @return static
     */
    public function email() : static
    {
        $this->rules['email'] = [];
        return $this;
    }

    /**
     * Add rule to validate field has value equals other field.
     *
     * @param string $equalsField
     *
     * @return static
     */
    public function equals(string $equalsField) : static
    {
        $this->rules['equals'] = [$equalsField];
        return $this;
    }

    /**
     * Add rule to validate field is in list.
     *
     * @param string ...$in
     *
     * @see Validator::in()
     *
     * @return static
     */
    public function in(string ...$in) : static
    {
        $this->rules['in'] = $in;
        return $this;
    }

    /**
     * Add rule to validate field is set.
     *
     * @see Validator::isset()
     *
     * @return static
     */
    public function isset() : static
    {
        $this->rules['isset'] = [];
        return $this;
    }

    /**
     * Add to rule to validate is less than or equal to.
     *
     * @param int $lessThanOrEqualTo
     *
     * @see Validator::lessOrEqual()
     *
     * @return static
     */
    public function lessOrEqual(int $lessThanOrEqualTo) : static
    {
        $this->rules['lessOrEqual'] = [$lessThanOrEqualTo];
        return $this;
    }

    /**
     * Add rule to validate exact length.
     *
     * @param int $length
     *
     * @see Validator::length()
     *
     * @return static
     */
    public function length(int $length) : static
    {
        $this->rules['length'] = [$length];
        return $this;
    }

    /**
     * Add rule to validate max length.
     *
     * @param int $maxLength
     *
     * @see Validator::maxLength()
     *
     * @return static
     */
    public function maxLength(int $maxLength) : static
    {
        $this->rules['maxLength'] = [$maxLength];
        return $this;
    }

    /**
     * Add rule to validate min length.
     *
     * @param int $minLength
     *
     * @see Validator::minLength()
     *
     * @return static
     */
    public function minLength(int $minLength) : static
    {
        $this->rules['minLength'] = [$minLength];
        return $this;
    }

    /**
     * Add rule for the field to be optional.
     *
     * If the field is empty, the validation will pass.
     *
     * @see Validation::validateField()
     *
     * @return static
     */
    public function optional() : static
    {
        $this->rules['optional'] = [];
        return $this;
    }

    /**
     * Add rule to validate required value.
     *
     * @see Validator::required()
     *
     * @return static
     */
    public function required() : static
    {
        $this->rules['required'] = [];
        return $this;
    }

    /**
     * Add rule to validate special characters.
     *
     * @param int $quantity
     * @param string $characters
     *
     * @see Validator::specialChar()
     *
     * @return static
     */
    public function specialChar(
        int $quantity = 1,
        string $characters = '!"#$%&\'()*+,-./:;=<>?@[\]^_`{|}~'
    ) : static {
        $this->rules['specialChar'] = [$quantity, $characters];
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->getRules();
    }
}
