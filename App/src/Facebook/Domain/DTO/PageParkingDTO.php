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
 * This class represents parking options for a Page. Useful for Facebook Pages that have a business with parking.
 * @see https://developers.facebook.com/docs/graph-api/reference/page-parking/
 */
class PageParkingDTO implements JsonSerializable
{

    /**
     * @param int $lot    [Default] Whether lot parking is available
     * @param int $street [Default] Whether street parking is available
     * @param int $valet  [Default] Whether valet parking is available
     */
    public function __construct(
        public readonly int $lot,
        public readonly int $street,
        public readonly int $valet
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'lot'    => $this->lot,
            'street' => $this->street,
            'valet'  => $this->valet,
        ];
    }
}

