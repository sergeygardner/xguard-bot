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
use XGuard\Bot\Facebook\Domain\Enum\AdRecommendationConfidenceEnum;
use XGuard\Bot\Facebook\Domain\Enum\AdRecommendationImportanceEnum;

/**
 * This class represents a recommendation object that suggests potential improvements around the ad object's configuration.
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-recommendation/
 */
class AdRecommendationDTO implements JsonSerializable
{

    /**
     * @param string                         $blame_field         [Default] Field to associate the recommendation with (optional)
     * @param int                            $code                [Default] Unique recommendation code
     * @param AdRecommendationConfidenceEnum $confidence          [Default] Indicator of how reliable recommendation is. Allowed values are: HIGH, MEDIUM, LOW
     * @param AdRecommendationImportanceEnum $importance          [Default] Indicator of how important recommendation is. Allowed values are: HIGH, MEDIUM, LOW
     * @param string                         $message             [Default] Content of the recommendation message
     * @param AdRecommendationDataDTO        $recommendation_data [Default] Additional data associated with the recommendation. Returned fields can vary depending on the recommendation code.
     * @param string                         $title               [Default] Recommendation title
     */
    public function __construct(
        public readonly string $blame_field,
        public readonly int $code,
        public readonly AdRecommendationConfidenceEnum $confidence,
        public readonly AdRecommendationImportanceEnum $importance,
        public readonly string $message,
        public readonly AdRecommendationDataDTO $recommendation_data,
        public readonly string $title
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'blame_field'         => $this->blame_field,
            'code'                => $this->code,
            'confidence'          => $this->confidence,
            'importance'          => $this->importance,
            'message'             => $this->message,
            'recommendation_data' => $this->recommendation_data,
            'title'               => $this->title,
        ];
    }
}
