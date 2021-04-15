<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business;

use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Model\ConditionalAvailabilitiesBulkApi;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Model\ConditionalAvailabilitiesBulkApiInterface;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\ConditionalAvailabilitiesBulkApiDependencyProvider;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Persistence\CConditionalAvailabilitiesBulkApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\ConditionalAvailabilitiesBulkApiConfig getConfig()
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
            $this->createApiDataTransferMapper()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface
     *
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getConditionalAvailabilityFacade(): ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilitiesBulkApiDependencyProvider::FACADE_CONDITIONAL_AVAILABILITY);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapperInterface
     */
    protected function createApiDataTransferMapper(): TransferMapperInterface
    {
        return new TransferMapper();
    }
}
