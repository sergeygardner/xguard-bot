<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\DTO;

use JsonSerializable;

/**
 * The class represents mobile store URLs for a Facebook App
 * @see https://developers.facebook.com/docs/graph-api/reference/application-object-store-urls/
 */
class ApplicationObjectStoreURLsDTO implements JsonSerializable
{

    /**
     * @param string $amazon_app_store [Default] URL for the app in the Amazon App store
     * @param string $fb_canvas        [Default] URL for the Facebook Canvas app
     * @param string $fb_gameroom      [Default] URL for the app in Facebook Gameroom
     * @param string $google_play      [Default] URL for the app in the Google Play Store
     * @param string $instant_game     [Default] URL for the Instant Game
     * @param string $itunes           [Default] URL for the app in the iTunes store
     * @param string $itunes_ipad      [Default] URL for the iPad app in the iTunes store
     * @param string $windows_10_store [Default] URL for the app in the Windows 10 store
     */
    public function __construct(
        public readonly string $amazon_app_store,
        public readonly string $fb_canvas,
        public readonly string $fb_gameroom,
        public readonly string $google_play,
        public readonly string $instant_game,
        public readonly string $itunes,
        public readonly string $itunes_ipad,
        public readonly string $windows_10_store
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'amazon_app_store' => $this->amazon_app_store,
            'fb_canvas'        => $this->fb_canvas,
            'fb_gameroom'      => $this->fb_gameroom,
            'google_play'      => $this->google_play,
            'instant_game'     => $this->instant_game,
            'itunes'           => $this->itunes,
            'itunes_ipad'      => $this->itunes_ipad,
            'windows_10_store' => $this->windows_10_store,
        ];
    }
}
