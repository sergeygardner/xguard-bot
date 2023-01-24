<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\DTO;

use JsonSerializable;

/**
 * This class represents a point on the map.
 */
final class LocationDTO implements JsonSerializable
{

    /**
     * @param float      $longitude              Longitude as defined by sender
     * @param float      $latitude               Latitude as defined by sender
     * @param float|null $horizontal_accuracy    Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null   $live_period            Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
     * @param int|null   $heading                Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @param int|null   $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
     */
    public function __construct(
        public readonly float $longitude,
        public readonly float $latitude,
        public readonly ?float $horizontal_accuracy,
        public readonly ?int $live_period,
        public readonly ?int $heading,
        public readonly ?int $proximity_alert_radius,
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'longitude'              => $this->longitude,
            'latitude'               => $this->latitude,
            'horizontal_accuracy'    => $this->horizontal_accuracy,
            'live_period'            => $this->live_period,
            'heading'                => $this->heading,
            'proximity_alert_radius' => $this->proximity_alert_radius,
        ];
    }
}
