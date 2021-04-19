<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Model;

use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityCriteriaFilterTransfer;

class ConditionalAvailabilitiesBulkApi implements ConditionalAvailabilitiesBulkApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge
     */
    protected $conditionalAvailabilityFacade;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface
     */
    protected $conditionalAvailabilityBulkApiMapper;

    /**
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge $conditionalAvailabilityFacade
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper\ConditionalAvailabilityBulkApiMapperInterface $conditionalAvailabilityBulkApiMapper
     */
    public function __construct(
        ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge $conditionalAvailabilityFacade,
        ConditionalAvailabilityBulkApiMapperInterface $conditionalAvailabilityBulkApiMapper
    ) {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
        $this->conditionalAvailabilityBulkApiMapper = $conditionalAvailabilityBulkApiMapper;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $groupedConditionalAvailabilityTransfers = $this->conditionalAvailabilityBulkApiMapper
            ->mapApiDataTransferToGroupedConditionalAvailabilityTransfers($apiDataTransfer);

        $productConcretes = $this->productFacade->findProductConcretesBySkus($skus);

        foreach ($collection as $conditionalAvailabilityTransfer) {
            $conditionalAvailabilityTransfer->setFkProduct(
                $this->findIdProductConcreteBySkuFromCollection(
                    $conditionalAvailabilityTransfer->getSku(),
                    $productConcretes
                )
            );
        }

        $conditionalAvailabilityCriteriaFilterTransfer = (new ConditionalAvailabilityCriteriaFilterTransfer())->setSkus($skus);
        $conditionalAvailabilityCollectionTransfer = $this->conditionalAvailabilityFacade
            ->findConditionalAvailabilities($conditionalAvailabilityCriteriaFilterTransfer);

        $conditionalAvailabilities = $conditionalAvailabilityCollectionTransfer->toArray();
        $conditionalAvailabilityIds = [];
        foreach ($collection as $conditionalAvailabilityTransfer) {
            $conditionalAvailabilityResponseTransfer = $this->conditionalAvailabilityFacade
                ->createConditionalAvailability($conditionalAvailabilityTransfer);

            if ($conditionalAvailabilityResponseTransfer->getIsSuccessful()) {
            }
        }

        return;
    }

    /**
     * @param string $sku
     * @param array $productConcretes
     *
     * @return int|null
     */
    protected function findIdProductConcreteBySkuFromCollection(string $sku, array $productConcretes): ?int
    {
        foreach ($productConcretes as $productConcrete) {
            if ($productConcrete->getSku() === $sku) {
                return $productConcrete->getIdProductConcrete();
            }
        }
    }
}
