<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilitiesBulkApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilitiesBulkApiConfig getConfig()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Persistence\ConditionalAvailabilitiesBulkApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\ConditionalAvailabilitiesBulkApiFacadeInterface getFacade()
 */
class ConditionalAvailabilitiesBulkApiValidatorPlugin extends AbstractPlugin implements ApiValidatorPluginInterface
{
    /**
     * @api
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return ConditionalAvailabilitiesBulkApiConfig::RESOURCE_CONDITIONAL_AVAILABILITIES_BULK;
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiValidationErrorTransfer[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array
    {
        return [];
        //return $this->getFacade()->validate($apiDataTransfer);
    }
}
