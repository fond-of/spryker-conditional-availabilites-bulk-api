<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade;

use FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface;
use Generated\Shared\Transfer\ConditionalAvailabilityCollectionTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityCriteriaFilterTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

class ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge implements ConditionalAvailabilitiesApiToConditionalAvailabilityFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityFacade;

    /**
     * @param \FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade
     */
    public function __construct(ConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade)
    {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
    }

    public function createConditionalAvailability(
        ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
    ): ConditionalAvailabilityResponseTransfer {
        return $this->conditionalAvailabilityFacade->createConditionalAvailability($conditionalAvailabilityTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    public function updateConditionalAvailability(
        ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
    ): ConditionalAvailabilityResponseTransfer {
        return $this->conditionalAvailabilityFacade->updateConditionalAvailability($conditionalAvailabilityTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityCriteriaFilterTransfer $conditionalAvailabilityCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityCollectionTransfer
     */
    public function findConditionalAvailabilities(
        ConditionalAvailabilityCriteriaFilterTransfer $conditionalAvailabilityCriteriaFilterTransfer
    ): ConditionalAvailabilityCollectionTransfer {
        return $this->conditionalAvailabilityFacade->findConditionalAvailabilities($conditionalAvailabilityCriteriaFilterTransfer);
    }

}
