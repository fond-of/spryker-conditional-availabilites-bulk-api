<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Model;

use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitesBulkApiToConditionalAvailabilityFacadeBridge;
use FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToProductFacadeInterface;
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
     * @var \FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade\ConditionalAvailabilitiesApiToProductFacadeInterface
     */
    protected $productFacade;

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
        ConditionalAvailabilitiesApiToProductFacadeInterface $productFacade,
        TransferMapperInterface $transferMapper
    ) {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
        $this->productFacade = $productFacade;
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
        $conditionalAvailabilitiesBulkResponse = new ConditionalA
        $collection = $this->transferMapper->toTransferCollection($apiDataTransfer->getData());

        if (count($collection) === 0) {

        }

        $skus = [];
        foreach ($collection as $item) {
            $skus[] =  $item->getSku();
        }

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
