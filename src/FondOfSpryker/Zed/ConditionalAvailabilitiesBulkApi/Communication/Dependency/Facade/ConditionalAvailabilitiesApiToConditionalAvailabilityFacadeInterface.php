<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade;

use Generated\Shared\Transfer\ConditionalAvailabilityCollectionTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityCriteriaFilterTransfer;

interface ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityCriteriaFilterTransfer $conditionalAvailabilityCriteriaFilterTransfer
     * 
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityCollectionTransfer
     */
    public function findConditionalAvailabilities(
        ConditionalAvailabilityCriteriaFilterTransfer $conditionalAvailabilityCriteriaFilterTransfer
    ): ConditionalAvailabilityCollectionTransfer;
}
