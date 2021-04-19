<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business;

use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapper;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Model\ConditionalAvailabilitiesBulkApi;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Model\ConditionalAvailabilitiesBulkApiInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilitiesBulkApiDependencyProvider;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToProductFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Persistence\CConditionalAvailabilitiesBulkApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilitiesBulkApiConfig getConfig()
 */
class ConditionalAvailabilitiesBulkApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApiInterface
     */
    public function createConditionalAvailabilitiesBulkApi(): ConditionalAvailabilitiesBulkApiInterface
    {
        return new ConditionalAvailabilitiesBulkApi(
            $this->getConditionalAvailabilityFacade(),
            $this->getProductFacade(),
            $this->createApiDataTransferMapper()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface
     *
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getConditionalAvailabilityFacade(): ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilitiesBulkApiDependencyProvider::FACADE_CONDITIONAL_AVAILABILITY);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToProductFacadeInterface
     *
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getProductFacade(): ConditionalAvailabilitiesApiToProductFacadeInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilitiesBulkApiDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface
     */
    protected function createApiDataTransferMapper(): ConditionalAvailabilityBulkApiMapperInterface
    {
        return new ConditionalAvailabilityBulkApiMapper();
    }
}
