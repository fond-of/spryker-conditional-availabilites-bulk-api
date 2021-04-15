<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilitiesBulkApiBusinessFactory getFactory()
 */
class ConditionalAvailabilitiesBulkApiFacade extends AbstractFacade implements ConditionalAvailabilitiesBulkApiFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addConditionalAvailability(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        return new ApiItemTransfer();
    }
}
