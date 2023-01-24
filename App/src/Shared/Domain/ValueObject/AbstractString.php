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
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;

/**
 * @see     allowedLengthRule
 * @see     blankValueRule
 * @see     trimmedValueRule
 * @see     allowedFormat
 *
 * @package XGuard\Bot\Shared\Domain\ValueObject
 */
abstract class AbstractString implements ValueObjectInterface
{

    /**
     * @var string
     */
    protected string $value;

    /**
     * @var LazyAssertion
     */
    protected LazyAssertion $assertion;

    /**
     * AbstractString constructor.
     *
     * @param string $value
     *
     * @throws InvalidObjectValueException
     */
    public function __construct(string $value)
    {
        $this->value     = $value;
        $this->assertion = Assert::lazy();

        try {
            $this->assertion->tryAll()->that($this->value, static::class);

            $this
                ->allowedLengthRule()
                ->blankValueRule()
                ->trimmedValueRule()
                ->allowedFormat();

            $this->assertion->verifyNow();
        } catch (LazyAssertionException $exception) {
            throw new InvalidObjectValueException(
                "Value is not valid string: '$value'",
                E_USER_ERROR,
                $exception
            );
        }
    }

    /**
     * @return $this
     */
    protected function allowedFormat(): self
    {
        return $this;
    }

    /**
     * @return $this
     */
    protected function trimmedValueRule(): self
    {
        $this->assertion->length(
            mb_strlen(trim($this->value)),
            "The value must not contain any leading or trailing whitespaces"
        );

        return $this;
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return mb_strlen($this->getValue());
    }

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return $this
     */
    protected function blankValueRule(): self
    {
        $this->assertion->notBlank("The value cannot be empty or consist only of whitespaces");

        return $this;
    }

    /**
     * @return $this
     */
    protected function allowedLengthRule(): self
    {
        $this->assertion->maxLength($this->getAllowedLength(), "The value exceeds the allowed length");

        return $this;
    }

    /**
     * @see https://www.php.net/manual/ru/language.types.string.php#language.types.string
     *      https://www.php.net/manual/ru/language.types.string.php#language.types.string.details
     *
     * @return int
     */
    protected function getAllowedLength(): int
    {
        return PHP_INT_MAX;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
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
        return $this->getValue();
    }

}
