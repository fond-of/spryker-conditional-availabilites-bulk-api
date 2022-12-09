<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi;

use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeBridge;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToProductFacadeBridge;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\QueryContainer\ConditionalAvailabilityBulkApiToApiQueryContainerBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ConditionalAvailabilityBulkApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_CONDITIONAL_AVAILABILITY = 'FACADE_CONDITIONAL_AVAILABILITY';

    /**
     * @var string
     */
    public const FACADE_PRODUCT = 'FACADE_PRODUCT';

    /**
     * @var string
     */
    public const QUERY_CONTAINER_API = 'QUERY_CONTAINER_API';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addConditionalAvailabilityFacade($container);
        $container = $this->addProductFacade($container);

        return $this->addApiQueryContainer($container);
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addConditionalAvailabilityFacade(Container $container): Container
    {
        $container[static::FACADE_CONDITIONAL_AVAILABILITY] = static function (Container $container) {
            return new ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeBridge(
                $container->getLocator()->conditionalAvailability()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductFacade(Container $container): Container
    {
        $container[static::FACADE_PRODUCT] = static function (Container $container) {
            return new ConditionalAvailabilityBulkApiToProductFacadeBridge(
                $container->getLocator()->product()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addApiQueryContainer(Container $container): Container
    {
        $container[static::QUERY_CONTAINER_API] = static function (Container $container) {
            return new ConditionalAvailabilityBulkApiToApiQueryContainerBridge(
                $container->getLocator()->api()->queryContainer(),
            );
        };

        return $container;
    }
}
