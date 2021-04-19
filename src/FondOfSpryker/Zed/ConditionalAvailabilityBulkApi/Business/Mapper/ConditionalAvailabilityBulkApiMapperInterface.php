<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Business\Mapper;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

interface ConditionalAvailabilityBulkApiMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function mapApiDataTransferToGroupedConditionalAvailabilityTransfers(
        ApiDataTransfer $apiDataTransfer
    ): array;

    /**
     * @param array $data
     *
     * @return array
     */
    public function mapDataToConditionalAvailabilityTransfer(
        array $data
    ): ConditionalAvailabilityTransfer;
}
