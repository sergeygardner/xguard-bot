<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Enum;

use JsonSerializable;

/**
 * All the platform the app supports
 */
enum SupportedPlatformsEnum implements JsonSerializable
{

    case WEB;
    case CANVAS;
    case MOBILE_WEB;
    case IPHONE;
    case IPAD;
    case ANDROID;
    case WINDOWS;
    case AMAZON;
    case SUPPLEMENTARY_IMAGES;
    case GAMEROOM;
    case INSTANT_GAME;
    case OCULUS;
    case SAMSUNG;
    case XIAOMI;

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
