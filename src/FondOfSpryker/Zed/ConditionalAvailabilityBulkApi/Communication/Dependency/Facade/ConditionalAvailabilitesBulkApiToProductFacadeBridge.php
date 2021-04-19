<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade;

use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ConditionalAvailabilitesBulkApiToProductFacadeBridge implements ConditionalAvailabilitiesApiToProductFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * ConditionalAvailabilitesBulkApiToProductFacadeBridge constructor.
     *
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param array $skus
     *
     * @return array
     */
    public function findProductConcretesBySkus(array $skus): array
    {
        return $this->productFacade->findProductConcretesBySkus($skus);
    }
}
