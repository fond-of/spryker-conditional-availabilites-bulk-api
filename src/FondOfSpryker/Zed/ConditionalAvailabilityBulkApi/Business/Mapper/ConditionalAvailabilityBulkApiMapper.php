<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

class ConditionalAvailabilityBulkApiMapper implements ConditionalAvailabilityBulkApiMapperInterface
{
    protected const DATA_KEY_SKU = 'sku';

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function mapApiDataTransferToGroupedConditionalAvailabilityTransfers(
        ApiDataTransfer $apiDataTransfer
    ): array {
        $groupedConditionalAvailabilityTransfers = [];

        foreach ($apiDataTransfer->getData() as $item) {
            if (empty($item[static::DATA_KEY_SKU])) {
                continue;
            }

            $conditionalAvailabilityTransfer = $this->mapDataToConditionalAvailabilityTransfer($item);
            $groupedConditionalAvailabilityTransfers[$item[static::DATA_KEY_SKU]] = $conditionalAvailabilityTransfer;
        }

        return $groupedConditionalAvailabilityTransfers;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function mapDataToConditionalAvailabilityTransfer(array $data): ConditionalAvailabilityTransfer
    {
        return (new ConditionalAvailabilityTransfer())
            ->fromArray($data);
    }
}
