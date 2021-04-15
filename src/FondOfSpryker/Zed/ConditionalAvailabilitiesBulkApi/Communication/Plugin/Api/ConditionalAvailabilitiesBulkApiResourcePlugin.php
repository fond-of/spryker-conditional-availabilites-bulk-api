<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\ConditionalAvailabilitiesBulkApiConfig;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Persistence\ConditionalAvailabilitiesBulkApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\ConditionalAvailabilitiesBulkApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\ConditionalAvailabilitiesBulkApiConfig getConfig()
 */
class ConditionalAvailabilitiesBulkApiResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
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
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        return $this->getFacade()->addConditionalAvailabilities($apiDataTransfer);
    }
}
