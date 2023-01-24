<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Domain\ValueObject;

use Assert\Assert;
use Assert\LazyAssertion;
use Assert\LazyAssertionException;
use TypeError;
use XGuard\Bot\Shared\DOmain\Exception\InvalidObjectValueException;

/**
 * @see     https://ru.wikipedia.org/wiki/%D0%A7%D0%B8%D1%81%D0%BB%D0%BE
 * @see     allowedRangeRule
 *
 * @package XGuard\Bot\Shared\Domain\ValueObject
 */
abstract class AbstractNumber implements ValueObjectInterface
{

    /**
     * @var int|float
     */
    protected int|float $value;

    /**
     * @var LazyAssertion
     */
    protected LazyAssertion $assertion;

    /**
     * AbstractNumber constructor.
     *
     * @param int|float $value
     *
     * @throws TypeError
     * @throws InvalidObjectValueException
     */
    public function __construct(int|float $value)
    {
        if (!is_int($value) && !is_float($value)) {
            throw new TypeError();
        }

        $this->value     = $value;
        $this->assertion = Assert::lazy();

        try {
            $this->assertion->tryAll()->that($this->value, static::class);

            $this->allowedRangeRule();

            $this->assertion->verifyNow();
        } catch (LazyAssertionException $exception) {
            throw new InvalidObjectValueException(
                "Value is not valid number: '$value'",
                E_USER_ERROR,
                $exception
            );
        }
    }

    /**
     * @return $this
     */
    protected function allowedRangeRule(): self
    {
        $message = "The value is not in the allowed range";

        if (is_int($this->value)) {
            $this->assertion->between(PHP_INT_MIN, PHP_INT_MAX, $message);
        } else {
            $this->assertion->between(PHP_FLOAT_MIN, PHP_FLOAT_MAX, $message);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string)$this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function getValue(): int|float
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     * @return int|float
     */
    public function jsonSerialize(): mixed
    {
        return $this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function isEquals(object $object): bool
    {
        return $this->isComparable($object) && $this->hash() === $object->hash();
    }

    /**
     * @inheritDoc
     */
    public function isComparable(object $object): bool
    {
        return ($object instanceof static);
    }

    /**
     * @inheritDoc
     */
    public function hash(): string
    {
        return (string)$this->getValue();
    }

    /**
     * @param self $other
     *
     * @return static
     */
    public function add(self $other): self
    {
        return new static($this->value + $other->getValue());
    }

    /**
     * @param self $other
     *
     * @return static
     */
    public function subtract(self $other): self
    {
        return new static($this->value - $other->getValue());
    }

    /**
     * @param self $other
     *
     * @return static
     */
    public function divided(self $other): self
    {
        return new static($this->value / $other->getValue());
    }

    /**
     * @param self $other
     *
     * @return static
     */
    public function multiply(self $other): self
    {
        return new static($this->value * $other->getValue());
    }

}
