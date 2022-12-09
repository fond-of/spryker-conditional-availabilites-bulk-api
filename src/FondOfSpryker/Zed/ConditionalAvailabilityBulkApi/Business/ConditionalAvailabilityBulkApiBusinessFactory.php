<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business;

use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapper;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Model\ConditionalAvailabilityBulkApi;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Model\ConditionalAvailabilityBulkApiInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilityBulkApiDependencyProvider;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToProductFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\QueryContainer\ConditionalAvailabilityBulkApiToApiQueryContainerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilityBulkApiConfig getConfig()
 */
class ConditionalAvailabilityBulkApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Model\ConditionalAvailabilityBulkApiInterface
     */
    public function createConditionalAvailabilitiesBulkApi(): ConditionalAvailabilityBulkApiInterface
    {
        return new ConditionalAvailabilityBulkApi(
            $this->createConditionalAvailabilityBulkApiMapper(),
            $this->getConditionalAvailabilityFacade(),
            $this->getProductFacade(),
            $this->getApiQueryContainer(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\QueryContainer\ConditionalAvailabilityBulkApiToApiQueryContainerInterface
     */
    protected function getApiQueryContainer(): ConditionalAvailabilityBulkApiToApiQueryContainerInterface
    {
        return $this->getProvidedDependency(
            ConditionalAvailabilityBulkApiDependencyProvider::QUERY_CONTAINER_API,
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeInterface
     */
    protected function getConditionalAvailabilityFacade(): ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeInterface
    {
        return $this->getProvidedDependency(
            ConditionalAvailabilityBulkApiDependencyProvider::FACADE_CONDITIONAL_AVAILABILITY,
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToProductFacadeInterface
     */
    protected function getProductFacade(): ConditionalAvailabilityBulkApiToProductFacadeInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilityBulkApiDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface
     */
    protected function createConditionalAvailabilityBulkApiMapper(): ConditionalAvailabilityBulkApiMapperInterface
    {
        return new ConditionalAvailabilityBulkApiMapper();
    }
}
