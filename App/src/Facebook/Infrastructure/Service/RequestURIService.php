<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Service;

use Psr\Http\Message\UriInterface;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
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
    public function setToken(?TokenValueObject $token): RequestURIServiceInterface
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMessage(ChannelEntity $channelEntity): UriInterface
    {
        return new URIValueObject(
            str_replace(
                ['<what>'],
                [
                    sprintf(
                        '%s/posts?access_token=%s',
                        $channelEntity->getChannelId(),
                        $this->token->getValue(),
                    ),
                ],
                $this->baseURI->getValue()
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function getMessages(ChannelEntity $channelEntity): UriInterface
    {
        return new URIValueObject(
            str_replace(
                ['<what>'],
                [
                    sprintf(
                        '%s/posts?access_token=%s',
                        $channelEntity->getChannelId(),
                        $this->token->getValue(),
                    ),
                ],
                $this->baseURI->getValue()
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function getAccessToken(string $clientId, string $clientSecret): UriInterface
    {
        return new URIValueObject(
            str_replace(
                ['<what>'],
                [
                    sprintf(
                        'oauth/access_token?grant_type=client_credentials&scope=user_posts&client_id=%s&client_secret=%s',
                        $clientId,
                        $clientSecret
                    ),
                ],
                $this->baseURI->getValue()
            )
        );
    }
}
