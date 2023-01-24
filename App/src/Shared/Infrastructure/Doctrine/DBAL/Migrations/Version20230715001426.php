<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230715001426 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Add/Remove s_message_action and message_action enum';
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->addSql(
            "CREATE TYPE message_action AS ENUM ('sent','close','open','error');"
        );
        $this->addSql(
            '
                CREATE TABLE IF NOT EXISTS "s_message_action"
                (
                    id                  uuid            not null        primary key,
                    message_id          uuid            not null,
                    channel_to_bot_id   uuid            not null,
                    action_date         timestamp       not null,
                    action              message_action  not null
                );       
            '
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS "s_message_action";');
        $this->addSql('DROP TYPE message_action;');
    }
}
