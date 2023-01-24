<?php declare(strict_types=1);

namespace Test\App;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Driver\API\ExceptionConverter;
use Doctrine\DBAL\Driver\Result;
use Doctrine\DBAL\Driver\Statement;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\InvalidHydrationMode;
use Doctrine\ORM\Internal\Hydration\ArrayHydrator;
use Doctrine\ORM\Internal\Hydration\ObjectHydrator;
use Doctrine\ORM\Internal\Hydration\ScalarColumnHydrator;
use Doctrine\ORM\Internal\Hydration\ScalarHydrator;
use Doctrine\ORM\Internal\Hydration\SimpleObjectHydrator;
use Doctrine\ORM\Internal\Hydration\SingleScalarHydrator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\ClassMetadataFactory;
use Doctrine\ORM\Query\FilterCollection;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\UnitOfWork;
use Doctrine\Persistence\Mapping\Driver\StaticPHPDriver;

/**
 * @method mixed wrapInTransaction(callable $func)
 */
final class InMemoryEntityManager implements EntityManagerInterface
{

    /**
     * @var
     */
    private $config;

    /**
     * @param array $fieldMappings
     */
    public function __construct(public array $fieldMappings = [])
    {

    }

    /**
     * @param array $fieldMappings
     *
     * @return $this
     */
    public function setFieldMappings(array $fieldMappings): self
    {
        $this->fieldMappings = $fieldMappings;

        return clone $this;
    }

    /**
     * @inheritDoc
     */
    public function getMetadataFactory()
    {
        $classMetadataFactory = new ClassMetadataFactory();

        $classMetadataFactory->setEntityManager($this);

        return $classMetadataFactory;
    }

    /**
     * @inheritDoc
     */
    public function refresh(object $object, ?int $lockMode = null): void
    {

    }

    /**
     * @inheritDoc
     */
    public function getRepository($className)
    {
        // TODO: Implement getRepository() method.
    }

    /**
     * @inheritDoc
     */
    public function getCache()
    {
        // TODO: Implement getCache() method.
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getConnection()
    {
        return new Connection(
            [],
            new class implements Driver {

                /**
                 * @inheritDoc
                 */
                public function connect(#[SensitiveParameter] array $params)
                {
                    return new /**
                     * @method object getNativeConnection()
                     */ class implements Driver\Connection {

                        /**
                         * @inheritDoc
                         */
                        public function prepare(string $sql): Statement
                        {
                            return new class implements Statement {

                                /**
                                 * @inheritDoc
                                 */
                                public function bindValue($param, $value, $type = ParameterType::STRING)
                                {
                                    // TODO: Implement bindValue() method.
                                }

                                /**
                                 * @inheritDoc
                                 */
                                public function bindParam(
                                    $param,
                                    &$variable,
                                    $type = ParameterType::STRING,
                                    $length = null
                                ) {
                                    // TODO: Implement bindParam() method.
                                }

                                /**
                                 * @inheritDoc
                                 */
                                public function execute($params = null): Result
                                {
                                    return new class implements Result {

                                        /**
                                         * @inheritDoc
                                         */
                                        public function fetchNumeric()
                                        {
                                            // TODO: Implement fetchNumeric() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function fetchAssociative()
                                        {
                                            // TODO: Implement fetchAssociative() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function fetchOne()
                                        {
                                            // TODO: Implement fetchOne() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function fetchAllNumeric(): array
                                        {
                                            // TODO: Implement fetchAllNumeric() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function fetchAllAssociative(): array
                                        {
                                            // TODO: Implement fetchAllAssociative() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function fetchFirstColumn(): array
                                        {
                                            // TODO: Implement fetchFirstColumn() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function rowCount(): int
                                        {
                                            // TODO: Implement rowCount() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function columnCount(): int
                                        {
                                            // TODO: Implement columnCount() method.
                                        }

                                        /**
                                         * @inheritDoc
                                         */
                                        public function free(): void
                                        {
                                            // TODO: Implement free() method.
                                        }
                                    };
                                }
                            };
                        }

                        /**
                         * @inheritDoc
                         */
                        public function query(string $sql): Result
                        {
                            // TODO: Implement query() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function quote($value, $type = ParameterType::STRING)
                        {
                            // TODO: Implement quote() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function exec(string $sql): int
                        {
                            // TODO: Implement exec() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function lastInsertId($name = null)
                        {
                            // TODO: Implement lastInsertId() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function beginTransaction()
                        {
                            // TODO: Implement beginTransaction() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function commit()
                        {
                            // TODO: Implement commit() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function rollBack()
                        {
                            // TODO: Implement rollBack() method.
                        }

                        public function __call(string $name, array $arguments)
                        {
                            // TODO: Implement @method object getNativeConnection()
                        }
                    };
                }

                /**
                 * @inheritDoc
                 */
                public function getDatabasePlatform()
                {
                    return new class extends AbstractPlatform {

                        /**
                         * @inheritDoc
                         */
                        public function getBooleanTypeDeclarationSQL(array $column)
                        {
                            // TODO: Implement getBooleanTypeDeclarationSQL() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getIntegerTypeDeclarationSQL(array $column)
                        {
                            return 'INT';
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getBigIntTypeDeclarationSQL(array $column)
                        {
                            // TODO: Implement getBigIntTypeDeclarationSQL() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getSmallIntTypeDeclarationSQL(array $column)
                        {
                            // TODO: Implement getSmallIntTypeDeclarationSQL() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        protected function _getCommonIntegerTypeDeclarationSQL(array $column)
                        {
                            // TODO: Implement _getCommonIntegerTypeDeclarationSQL() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        protected function initializeDoctrineTypeMappings()
                        {
                            // TODO: Implement initializeDoctrineTypeMappings() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getClobTypeDeclarationSQL(array $column)
                        {
                            // TODO: Implement getClobTypeDeclarationSQL() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getBlobTypeDeclarationSQL(array $column)
                        {
                            // TODO: Implement getBlobTypeDeclarationSQL() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getName()
                        {
                            // TODO: Implement getName() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        public function getCurrentDatabaseExpression(): string
                        {
                            // TODO: Implement getCurrentDatabaseExpression() method.
                        }

                        /**
                         * @inheritDoc
                         */
                        protected function getVarcharTypeDeclarationSQLSnippet(
                            $length,
                            $fixed/*, $lengthOmitted = false*/
                        )
                        {
                            return $fixed ? ($length > 0 ? 'CHAR('.$length.')' : 'CHAR(255)')
                                : ($length > 0 ? 'VARCHAR('.$length.')' : 'VARCHAR(255)');
                        }
                    };
                }

                /**
                 * @inheritDoc
                 */
                public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
                {
                    // TODO: Implement getSchemaManager() method.
                }

                /**
                 * @inheritDoc
                 */
                public function getExceptionConverter(): ExceptionConverter
                {
                    // TODO: Implement getExceptionConverter() method.
                }
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function getExpressionBuilder()
    {
        // TODO: Implement getExpressionBuilder() method.
    }

    /**
     * @inheritDoc
     */
    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    /**
     * @inheritDoc
     */
    public function transactional($func)
    {
        // TODO: Implement transactional() method.
    }

    /**
     * @inheritDoc
     */
    public function commit()
    {
        // TODO: Implement commit() method.
    }

    /**
     * @inheritDoc
     */
    public function rollback()
    {
        // TODO: Implement rollback() method.
    }

    /**
     * @inheritDoc
     */
    public function createQuery($dql = '')
    {
        // TODO: Implement createQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function createNamedQuery($name)
    {
        // TODO: Implement createNamedQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function createNativeQuery($sql, ResultSetMapping $rsm)
    {
        // TODO: Implement createNativeQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function createNamedNativeQuery($name)
    {
        // TODO: Implement createNamedNativeQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function createQueryBuilder()
    {
        // TODO: Implement createQueryBuilder() method.
    }

    /**
     * @inheritDoc
     */
    public function getReference($entityName, $id)
    {
        // TODO: Implement getReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getPartialReference($entityName, $identifier)
    {
        // TODO: Implement getPartialReference() method.
    }

    /**
     * @inheritDoc
     */
    public function close()
    {
        // TODO: Implement close() method.
    }

    /**
     * @inheritDoc
     */
    public function copy($entity, $deep = false)
    {
        // TODO: Implement copy() method.
    }

    /**
     * @inheritDoc
     */
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        // TODO: Implement lock() method.
    }

    /**
     * @inheritDoc
     */
    public function getEventManager()
    {
        return new EventManager();
    }

    /**
     * @inheritDoc
     */
    public function getConfiguration()
    {
        $configuration = new Configuration();

        $configuration->setMetadataDriverImpl(new StaticPHPDriver([]));

        return $configuration;
    }

    /**
     * @inheritDoc
     */
    public function isOpen()
    {
        // TODO: Implement isOpen() method.
    }

    /**
     * @inheritDoc
     */
    public function getUnitOfWork()
    {
        return new UnitOfWork($this);
    }

    /**
     * @inheritDoc
     */
    public function getHydrator($hydrationMode)
    {
        // TODO: Implement getHydrator() method.
    }

    /**
     * @inheritDoc
     */
    public function newHydrator($hydrationMode)
    {
        switch ($hydrationMode) {
            case AbstractQuery::HYDRATE_OBJECT:
                return new ObjectHydrator($this);

            case AbstractQuery::HYDRATE_ARRAY:
                return new ArrayHydrator($this);

            case AbstractQuery::HYDRATE_SCALAR:
                return new ScalarHydrator($this);

            case AbstractQuery::HYDRATE_SINGLE_SCALAR:
                return new SingleScalarHydrator($this);

            case AbstractQuery::HYDRATE_SIMPLEOBJECT:
                return new SimpleObjectHydrator($this);

            case AbstractQuery::HYDRATE_SCALAR_COLUMN:
                return new ScalarColumnHydrator($this);

            default:
                $class = $this->config->getCustomHydrationMode($hydrationMode);

                if ($class !== null) {
                    return new $class($this);
                }
        }

        throw InvalidHydrationMode::fromMode((string)$hydrationMode);
    }

    /**
     * @inheritDoc
     */
    public function getProxyFactory()
    {
        // TODO: Implement getProxyFactory() method.
    }

    /**
     * @inheritDoc
     */
    public function getFilters()
    {
        return new FilterCollection($this);
    }

    /**
     * @inheritDoc
     */
    public function isFiltersStateClean()
    {
        // TODO: Implement isFiltersStateClean() method.
    }

    /**
     * @inheritDoc
     */
    public function hasFilters()
    {
        // TODO: Implement hasFilters() method.
    }

    /**
     * @inheritDoc
     */
    public function getClassMetadata($className): ClassMetadata
    {
        $classMetaData = new ClassMetadata($className);

        $classMetaData->fieldMappings = $this->fieldMappings;
        $classMetaData->table         = ['name' => $className];

        return $classMetaData;
    }

    /**
     * @inheritDoc
     */
    public function find(string $className, $id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @inheritDoc
     */
    public function persist(object $object)
    {
        // TODO: Implement persist() method.
    }

    /**
     * @inheritDoc
     */
    public function remove(object $object)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     * @inheritDoc
     */
    public function detach(object $object)
    {
        // TODO: Implement detach() method.
    }

    /**
     * @inheritDoc
     */
    public function flush()
    {
        // TODO: Implement flush() method.
    }

    /**
     * @inheritDoc
     */
    public function initializeObject(object $obj)
    {
        // TODO: Implement initializeObject() method.
    }

    /**
     * @inheritDoc
     */
    public function contains(object $object)
    {
        // TODO: Implement contains() method.
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return void
     */
    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method ClassMetadataFactory getMetadataFactory()
        // TODO: Implement @method mixed wrapInTransaction(callable $func)
        // TODO: Implement @method void refresh(object $object, ?int $lockMode = null)
    }
}
