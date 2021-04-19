<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Dependency\Facade;

interface ConditionalAvailabilitiesApiToProductFacadeInterface
{
    /**
     * @param array $skus
     *
     * @return array
     */
    public function findProductConcretesBySkus(array $skus): array;
}
