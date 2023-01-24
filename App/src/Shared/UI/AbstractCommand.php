<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\UI;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;
use XGuard\Bot\Shared\Infrastructure\Service\ConsoleOptionService;

/**
 *
 */
abstract class AbstractCommand
{

    /**
     * @var ConsoleOptionService
     */
    protected ConsoleOptionService $consoleOptionService;

    /**
     * @var EntityManager
     */
    protected EntityManager $entityManager;

    /**
     * @throws Exception
     * @throws MissingMappingDriverImplementation
     * @throws ORMException
     */
    public function __construct(array $options)
    {
        $this->consoleOptionService = new ConsoleOptionService(
            $options
        );

        $paths     = [__DIR__."/../../../config/doctrine/mapping"];
        $isDevMode = $this->consoleOptionService->getDevMode();
        $dbParams  = [
            'driver'   => 'pdo_pgsql',
            'user'     => $this->consoleOptionService->getDatabaseUser(),
            'password' => $this->consoleOptionService->getDatabasePassword(),
            'dbname'   => $this->consoleOptionService->getDatabaseName(),
            'host'     => $this->consoleOptionService->getDatabaseHost(),
        ];

        $config              = ORMSetup::createXMLMetadataConfiguration($paths, $isDevMode);
        $connection          = DriverManager::getConnection($dbParams, $config);
        $this->entityManager = new EntityManager($connection, $config);
        $this->entityManager->newHydrator(AbstractQuery::HYDRATE_OBJECT);
    }
}
