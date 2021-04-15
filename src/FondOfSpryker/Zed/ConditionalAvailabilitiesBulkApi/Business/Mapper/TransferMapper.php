<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper;

use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

class TransferMapper implements TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityTransfer
     */
    public function toTransfer(array $data): ConditionalAvailabilityTransfer
    {
        $conditionalAvailabilityTransfer = new ConditionalAvailabilityTransfer();

        return $conditionalAvailabilityTransfer->fromArray($data, true);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function toTransferCollection(array $data): array
    {
        $transferCollection = [];
        
        foreach ($data as $itemData) {
            $transferCollection[] = $this->toTransfer($itemData);
        }
        
        return $transferCollection;
    }
}
