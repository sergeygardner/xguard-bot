<?php declare(strict_types=1);


namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\ValueObject\AbstractNumber;

/**
 *
 */
class AbstractNumberTest extends TestCase
{

    /**
     * @var AbstractNumber
     */
    private AbstractNumber $numberObject;

    /**
     * @var AbstractNumber
     */
    private AbstractNumber $numberObject2;

    /**
     * @var int
     */
    private int $value = 3;

    /**
     * @param string|null $name
     * @param array       $data
     * @param             $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->numberObject  = new class($this->value) extends AbstractNumber {

        };
        $this->numberObject2 = clone $this->numberObject;//because isComparable compares as instanceof static
    }

    /**
     *
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->numberObject);
    }

    /**
     *
     */
    public function testToString(): void
    {
        self::assertEquals($this->value, (int)(string)$this->numberObject);
        self::assertEquals($this->value, (int)$this->numberObject->__toString());
    }

    /**
     *
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertEquals(
            json_encode($this->value, JSON_THROW_ON_ERROR),
            json_encode($this->numberObject->jsonSerialize(), JSON_THROW_ON_ERROR)
        );
        self::assertEquals(
            json_encode($this->value, JSON_THROW_ON_ERROR),
            json_encode($this->numberObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     *
     */
    public function testIsEquals(): void
    {
        self::assertTrue($this->numberObject->isEquals($this->numberObject2));
    }

    /**
     * void
     */
    public function testIsComparable(): void
    {
        self::assertTrue($this->numberObject->isComparable($this->numberObject2));
    }

    /**
     *
     */
    public function testHash(): void
    {
        self::assertEquals($this->value, $this->numberObject->hash());
    }

    /**
     *
     */
    public function testGetValue(): void
    {
        self::assertEquals($this->value, $this->numberObject->getValue());
    }

    /**
     *
     */
    public function testAdd(): void
    {
        self::assertEquals($this->value + $this->value, (int)(string)$this->numberObject->add($this->numberObject2));
    }

    /**
     *
     */
    public function testSubtract(): void
    {
        self::assertEquals($this->value - $this->value, (int)(string)$this->numberObject->subtract($this->numberObject2));
    }

    /**
     *
     */
    public function testDivided(): void
    {
        self::assertEquals($this->value / $this->value, (int)(string)$this->numberObject->divided($this->numberObject2));
    }

    /**
     *
     */
    public function testMultiply(): void
    {
        self::assertEquals($this->value * $this->value, (int)(string)$this->numberObject->multiply($this->numberObject2));
    }
}
