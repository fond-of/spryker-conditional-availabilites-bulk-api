<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi;

use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ConditionalAvailabilitiesBulkApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_CONDITIONAL_AVAILABILITY = 'FACADE_CONDITIONAL_AVAILABILITY';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addConditionalAvailabilityFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addConditionalAvailabilityFacade(Container $container): Container
    {
        $container[static::FACADE_CONDITIONAL_AVAILABILITY] = static function (Container $container) {
            return new ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge(
                $container->getLocator()->conditionalAvailability()->facade()
            );
        };

        return $container;
    }
}
