<?php

namespace ContainerDhFx72q;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHoldera63b3 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerd8726 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties89d15 = [
        
    ];

    public function getConnection()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getConnection', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getMetadataFactory', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getExpressionBuilder', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'beginTransaction', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getCache', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getCache();
    }

    public function transactional($func)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'transactional', array('func' => $func), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'wrapInTransaction', array('func' => $func), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'commit', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->commit();
    }

    public function rollback()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'rollback', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getClassMetadata', array('className' => $className), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'createQuery', array('dql' => $dql), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'createNamedQuery', array('name' => $name), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'createQueryBuilder', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'flush', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'clear', array('entityName' => $entityName), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->clear($entityName);
    }

    public function close()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'close', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->close();
    }

    public function persist($entity)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'persist', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'remove', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'refresh', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'detach', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'merge', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getRepository', array('entityName' => $entityName), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'contains', array('entity' => $entity), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getEventManager', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getConfiguration', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'isOpen', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getUnitOfWork', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getProxyFactory', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'initializeObject', array('obj' => $obj), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'getFilters', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'isFiltersStateClean', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'hasFilters', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return $this->valueHoldera63b3->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerd8726 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHoldera63b3) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHoldera63b3 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHoldera63b3->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, '__get', ['name' => $name], $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        if (isset(self::$publicProperties89d15[$name])) {
            return $this->valueHoldera63b3->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera63b3;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHoldera63b3;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera63b3;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHoldera63b3;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, '__isset', array('name' => $name), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera63b3;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHoldera63b3;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, '__unset', array('name' => $name), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera63b3;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHoldera63b3;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, '__clone', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        $this->valueHoldera63b3 = clone $this->valueHoldera63b3;
    }

    public function __sleep()
    {
        $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, '__sleep', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;

        return array('valueHoldera63b3');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd8726 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd8726;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerd8726 && ($this->initializerd8726->__invoke($valueHoldera63b3, $this, 'initializeProxy', array(), $this->initializerd8726) || 1) && $this->valueHoldera63b3 = $valueHoldera63b3;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHoldera63b3;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHoldera63b3;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
