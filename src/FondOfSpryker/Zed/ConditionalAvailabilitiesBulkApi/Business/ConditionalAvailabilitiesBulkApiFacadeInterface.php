<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business;

use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

interface ConditionalAvailabilitiesBulkApiFacadeInterface
{
    /**
     * Specification:
     * - Add/Update conditional availabilities.
     * - Persist prices per added conditional availability.
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addConditionalAvailabilities(ApiDataTransfer $apiDataTransfer): ApiItemTransfer;
}
