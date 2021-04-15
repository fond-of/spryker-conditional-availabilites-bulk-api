<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\ConditionalAvailabilitiesBulkApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\ConditionalAvailabilitiesBulkApiConfig getConfig()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Persistence\ConditionalAvailabilitiesBulkApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\ConditionalAvailabilitiesBulkApiFacadeInterface getFacade()
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
