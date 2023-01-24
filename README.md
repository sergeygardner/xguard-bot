# XGuardChatBot

#### This is a console application to transfer certain messages from Facebook to certain Telegram channels.

#### The App's latest version is 1.0.0

#### Telegram Bot API version is 6.4 (December 30, 2022)

#### Facebook API is v17.0

## Requirements

- Docker Engine
- DockerCompose script aka docker-compose
- *nix system

## Preparing to start

- create a .env.local file in the root
- put everything from the root .env file with blank after =
- create a .env.local file in ./App/
- put and change everything you need there
- wisely choose every value

## Start services

- The external network creates as

```sh
docker network create xguard-service-bot-network
```

- The main services start as

```sh
DATABASE_USER=<DATABASE_USER> DATABASE_PASSWORD=<DATABASE_PASSWORD> DATABASE_NAME=<DATABASE_NAME> DATABASE_HOST=<DATABASE_HOST> docker-compose -f Service/Docker/docker-compose.yml up -d
```

- The mockoon service (an independent service) starts as

```sh
docker-compose -f Service/mockoon/docker-compose.yml up -d
```

- Execute migrations (see the section Migrations)

## Basic usage

- Get to the app container as

```sh
docker exec -ti xguard-service-bot-php sh
```

- Get to the database container as

```sh
docker exec -ti xguard-service-bot-database sh
```

- Get to the mockoon container as

```sh
docker exec -ti xguard-service-bot-mockoon sh
```

## Basic commands

- The default command is

```sh
bin/bot
bin/bot shared:index:list
```

- The default CRUD commands to set relations between FacebookChannel and TelegramBot are

```sh
bin/bot shared:channel_to_bot:create --channelId=<channelId> --botId=<botId>
bin/bot shared:channel_to_bot:read
bin/bot shared:channel_to_bot:update --id=<id> --channelId=<channelId> --newChannelId=<newChannelId> --botId=<botId> --newBotId=<newBotId>
bin/bot shared:channel_to_bot:delete --id=<id> --channelId=<channelId> --botId=<botId>
```

- The Telegram CRUD commands to set TelegramBot are

```sh
bin/bot telegram:bot:create --botName=<botName> --token=<token>
bin/bot telegram:bot:read
bin/bot telegram:bot:update --id=<id> --botName=<botName> --newBotName=<newBotName> --token=<token> --newToken=<newToken>
bin/bot telegram:bot:delete --id=<id> --botName=<botName> --token=<token>
```

- The Telegram CRUD commands to set TelegramChannel are

```sh
bin/bot telegram:channel:create --channelName=<channelName> --chatId=<chatId>
bin/bot telegram:channel:read
bin/bot telegram:channel:update --id=<id> --channelName=<channelName> --newChannelName=<newChannelName> --chatId=<chatId> --newChatId=<newChatId>
bin/bot telegram:channel:delete --id=<id> --channelName=<channelName> --chatId=<chatId>
```

- The Telegram CRUD commands to set relations between TelegramBot and TelegramChannel are

```sh
bin/bot telegram:channel_to_bot:create --channelId=<channelId> --botId=<botId>
bin/bot telegram:channel_to_bot:read
bin/bot telegram:channel_to_bot:update --id=<id> --channelId=<channelId> --newChannelId=<newChannelId> --botId=<botId> --newBotId=<newBotId>
bin/bot telegram:channel_to_bot:delete --id=<id> --channelId=<channelId> --botId=<botId>
```

- The Telegram command posts messages through the TelegramBot is

```sh
bin/bot telegram:message:post --baseURI="https://api.telegram.org/bot<token>/<method>" --botName=<botName> --channelName=<channelName>
```

- The Facebook CRUD commands to set FacebookBot are

```sh
bin/bot facebook:bot:create --clientId=<clientId> --clientSecret=<clientSecret> --botName=<botName> 
bin/bot facebook:bot:read
bin/bot facebook:bot:update --id=<id> --clientId=<clientId> --newClientId=<newClientId> --clientSecret=<clientSecret> --newClientSecret=<newClientSecret> --botName=<botName> --newBotName=<newBotName>
bin/bot facebook:bot:delete --id=<id> --clientId=<clientId> --clientSecret=<clientSecret> --botName=<botName>
```

- The Facebook CRUD commands to set FacebookChannel are

```sh
bin/bot facebook:channel:create --channelId=<channelId> --channelName=<channelName> --channelType=<channelType>
bin/bot facebook:channel:read
bin/bot facebook:channel:update --id=<id> --channelId=<channelId> --newChannelId=<newChannelId> --channelName=<channelName> --newChannelName=<newChannelName> --channelType=<channelType> --newChannelType=<newChannelType>
bin/bot facebook:channel:delete --id=<id> --channelId=<channelId> --channelName=<channelName> --channelType=<channelType>
```

- The Facebook CRUD commands to set relations between FacebookBot and FacebookChannel are

```sh
bin/bot facebook:channel_to_bot:create --channelId=<channelId> --botId=<botId>
bin/bot facebook:channel_to_bot:read
bin/bot facebook:channel_to_bot:update --id=<id> --channelId=<channelId> --newChannelId=<newChannelId> --botId=<botId> --newBotId=<newBotId>
bin/bot facebook:channel_to_bot:delete --id=<id> --channelId=<channelId> --botId=<botId>
```

- The Telegram command posts messages through the TelegramBot is

```sh
bin/bot facebook:post:get --baseURI="https://graph.facebook.com/v17.0/<what>" --botName=<botName> --channelName=<channelName>
```

## How to get requisites

### Telegram

- For creating a bot, go to [core.telegram.org/bots](https://core.telegram.org/bots).
- For checking an id of a channel, use a [web.telegram.org](https://web.telegram.org/).

### Facebook

- For creating a Facebook app, go to [developers.facebook.com/apps](https://developers.facebook.com/apps/).
- For confirming business stuff, go to [business.facebook.com](https://business.facebook.com/).
- When you get everything what you need to start, you can replace <...> in commands to the real values.

## How to fill

- add a Telegram Bot requisites
- add a Telegram Channel requisites
- add a relation between Telegram Bot and Telegram Channel
- add a Facebook Bot requisites
- add a Facebook Channel requisites
- add a relation between Facebook Bot and Facebook Channel
- add a relation between Facebook Channel and Telegram bot

## How to start bots

- start getting messages from Facebook
- start posting messages to Telegram

## PHPUnit testing

- Start a mockoon service
- Go to the app container as

```sh
docker exec -ti xguard-service-bot-php sh
```

- Start the tests as

```sh
XDEBUG_MODE=coverage vendor/phpunit/phpunit/phpunit --warm-coverage-cache --path-coverage --coverage-text --coverage-filter src/ tests/
```

## Migrations

- Go to the app container as

```sh
docker exec -ti xguard-service-bot-php sh
```

- Execute these scripts as

```sh
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Facebook\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230403002134 
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Facebook\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230711230141 
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Facebook\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230712011452 
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Shared\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230403002434 
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Shared\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230711230141 
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Shared\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230715001426 
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Telegram\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230403002134
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Telegram\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230711230141
vendor/bin/doctrine-migrations migrations:execute -n --configuration config/doctrine/migrations.yml --db-configuration config/doctrine/migrations-db.php  --up -- XGuard\\Bot\\Telegram\\Infrastructure\\Doctrine\\DBAL\\Migrations\\Version20230712011452
```

## ToDo

- using aimeos/map for MapCollection
- covering at least 90% of tests
- finalize Test\XGuard\Bot\InMemoryEntityManager
- pagination in Facebook /posts
- using relation between FacebookBot and FacebookChannel
