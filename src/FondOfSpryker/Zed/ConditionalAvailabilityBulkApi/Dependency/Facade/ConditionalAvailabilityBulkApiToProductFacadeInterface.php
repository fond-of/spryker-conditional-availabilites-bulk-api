<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade;

interface ConditionalAvailabilityBulkApiToProductFacadeInterface
{
    /**
     * @param string[] $skus
     *
     * @return int[]
     */
    public function getProductConcreteIdsByConcreteSkus(array $skus): array;
}
