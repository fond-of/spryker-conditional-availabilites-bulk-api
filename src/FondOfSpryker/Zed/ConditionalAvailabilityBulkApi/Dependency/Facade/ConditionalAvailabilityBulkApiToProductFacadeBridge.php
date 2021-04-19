<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade;

use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ConditionalAvailabilityBulkApiToProductFacadeBridge implements
    ConditionalAvailabilityBulkApiToProductFacadeInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param string[] $skus
     *
     * @return int[]
     */
    public function getProductConcreteIdsByConcreteSkus(array $skus): array
    {
        return $this->productFacade->getProductConcreteIdsByConcreteSkus($skus);
    }
}
