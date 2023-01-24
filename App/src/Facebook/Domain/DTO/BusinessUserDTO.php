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
 * The class represents a business user.
 * @see https://developers.facebook.com/docs/marketing-api/reference/business-user
 */
class BusinessUserDTO implements JsonSerializable
{

    /**
     * @param string      $id                 [Default] The business user's ID.
     * @param BusinessDTO $business           [Default] Business user is associated with this business.
     * @param string|null $email              User's email as provided in Business Manager.
     * @param string|null $finance_permission Financial permission role of the user in Business Manager, such as EDITOR, ANALYST, and so on.
     * @param string|null $first_name         User's first name as provided in Business Manager.
     * @param string|null $ip_permission      This user's ads right permission role in Business Manager, such as Reviewer and so on.
     * @param string|null $last_name          User's last name as provided in Business Manager.
     * @param string      $name               [Default] Name of user as provided in Business Manager.
     * @param string|null $pending_email      Email for the business user that is still pending verification.
     * @param string|null $role               Role of the user in Business Manager, such as Admin, Employee, and so on.
     * @param string|null $title              The title of the user in this business.
     * @param string|null $two_fac_status     Two-factor authentication status of the business-scoped user.
     */
    public function __construct(
        public readonly string $id,
        public readonly BusinessDTO $business,
        public readonly ?string $email,
        public readonly ?string $finance_permission,
        public readonly ?string $first_name,
        public readonly ?string $ip_permission,
        public readonly ?string $last_name,
        public readonly string $name,
        public readonly ?string $pending_email,
        public readonly ?string $role,
        public readonly ?string $title,
        public readonly ?string $two_fac_status
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                 => $this->id,
            'business'           => $this->business,
            'email'              => $this->email,
            'finance_permission' => $this->finance_permission,
            'first_name'         => $this->first_name,
            'ip_permission'      => $this->ip_permission,
            'last_name'          => $this->last_name,
            'name'               => $this->name,
            'pending_email'      => $this->pending_email,
            'role'               => $this->role,
            'title'              => $this->title,
            'two_fac_status'     => $this->two_fac_status,
        ];
    }
}
