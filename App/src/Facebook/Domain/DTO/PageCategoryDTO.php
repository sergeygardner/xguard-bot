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
 * This class represents a category for a Facebook Page.
 * @see https://developers.facebook.com/docs/graph-api/reference/page-category/
 */
class PageCategoryDTO implements JsonSerializable
{

    /**
     * @param string                 $id                 [Default] The id of the category.
     * @param string                 $api_enum           [Default] The value to be used, in the API, for category_enum.
     * @param PageCategoryDTO[]|null $fb_page_categories List of child categories.
     * @param string                 $name               [Default] The name of the category.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $api_enum,
        public readonly ?array $fb_page_categories,
        public readonly string $name
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                 => $this->id,
            'api_enum'           => $this->api_enum,
            'fb_page_categories' => $this->fb_page_categories,
            'name'               => $this->name,
        ];
    }
}
