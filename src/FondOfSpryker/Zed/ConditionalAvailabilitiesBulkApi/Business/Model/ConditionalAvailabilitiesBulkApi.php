<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Model;

use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityCollectionTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityCriteriaFilterTransfer;

class ConditionalAvailabilitiesBulkApi implements ConditionalAvailabilitiesBulkApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge
     */
    protected $conditionalAvailabilityFacade;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapperInterface
     */
    protected $transferMapper;

    /**
     * ConditionalAvailabilitiesBulkApi constructor.
     *
     * @param \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge $conditionalAvailabilityFacade
     * @param \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapperInterface $transferMapper
     */
    public function __construct(
        ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge $conditionalAvailabilityFacade,
        TransferMapperInterface $transferMapper
    ) {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
        $this->transferMapper = $transferMapper;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotSavedException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $collection = $this->transferMapper->toTransferCollection($apiDataTransfer->getData());

        if (count($collection) === 0) {

        }

        $skus = [];
        foreach ($collection as $item) {
            $skus[] =  $item->getSku();
        }

        $conditionalAvailabilityCriteriaFilterTransfer = (new ConditionalAvailabilityCriteriaFilterTransfer())->setSkus($skus);
        $conditionalAvailabilities = $this->conditionalAvailabilityFacade
            ->findConditionalAvailabilities($conditionalAvailabilityCriteriaFilterTransfer);

        return $this->apiQueryContainer->createApiItem(
            $conditionalAvailabilityTransfer,
            $conditionalAvailabilityTransfer->getIdConditionalAvailability()
        );
    }

}
