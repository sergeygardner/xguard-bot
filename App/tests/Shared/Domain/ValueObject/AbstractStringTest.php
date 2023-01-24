<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\ValueObject\AbstractString;

/**
 *
 */
class AbstractStringTest extends TestCase
{

    /**
     * @var AbstractString
     */
    private AbstractString $stringObject;

    /**
     * @var AbstractString
     */
    private AbstractString $stringObject2;

    /**
     * @var string
     */
    private string $value = 'test';

    /**
     * @param string|null $name
     * @param array       $data
     * @param             $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->stringObject = new class($this->value) extends AbstractString {

        };
        $this->stringObject2 = clone $this->stringObject;
    }

    /**
     *
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->stringObject);
    }

    /**
     *
     */
    public function testToString(): void
    {
        self::assertEquals($this->value, (string)$this->stringObject);
        self::assertEquals($this->value, $this->stringObject->__toString());
    }

    /**
     *
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertEquals(
            json_encode($this->value, JSON_THROW_ON_ERROR),
            json_encode($this->stringObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     *
     */
    public function testIsEquals(): void
    {
        self::assertTrue($this->stringObject->isEquals($this->stringObject2));
    }

    /**
     *
     */
    public function testIsComparable(): void
    {
        self::assertTrue($this->stringObject->isComparable($this->stringObject2));
    }

    /**
     *
     */
    public function testHash(): void
    {
        self::assertEquals($this->value, $this->stringObject->hash());
    }

    /**
     *
     */
    public function testGetValue(): void
    {
        self::assertEquals($this->value, $this->stringObject->getValue());
    }

    /**
     *
     */
    public function testLength(): void
    {
        self::assertEquals(strlen($this->value), $this->stringObject->length());
    }
}
