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

use DomainException;
use Psr\Http\Message\UriInterface;
use XGuard\Bot\Shared\Domain\ValueObject\Traits\Max2048SymbolsTrait;

/**
 * @package XGuard\Bot\Shared\Domain\ValueObject
 */
final class URIValueObject extends AbstractString implements UriInterface
{

    use Max2048SymbolsTrait;

    /**
     * @inheritDoc
     */
    public function getScheme(): string
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function getAuthority(): string
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function getUserInfo(): string
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function getHost(): string
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function getPort(): ?int
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function getPath(): string
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function getQuery(): string
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function getFragment(): string
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withScheme($scheme): UriInterface
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withUserInfo($user, $password = null): UriInterface
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withHost($host): UriInterface
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withPort($port): UriInterface
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withPath($path): UriInterface
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withQuery($query): UriInterface
    {
        throw new DomainException();
    }

    /**
     * @inheritDoc
     */
    public function withFragment($fragment): UriInterface
    {
        throw new DomainException();
    }
}
