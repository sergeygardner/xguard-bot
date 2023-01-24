<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Service;

use Psr\Http\Message\UriInterface;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\URIValueObject;

/**
 *
 */
final class RequestURIService implements RequestURIServiceInterface
{


    /**
     * @param BaseURIValueObject    $baseURI
     * @param TokenValueObject|null $token
     */
    public function __construct(private readonly BaseURIValueObject $baseURI, private ?TokenValueObject $token = null)
    {

    }

    /**
     * @inheritDoc
     */
    public function sendMessage(): UriInterface
    {
        return new URIValueObject(
            str_replace(
                ['<token>', '<method>'],
                [$this->token->getValue(), __FUNCTION__],
                $this->baseURI->getValue()
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function setToken(TokenValueObject $token): RequestURIServiceInterface
    {
        $this->token = $token;

        return $this;
    }
}
