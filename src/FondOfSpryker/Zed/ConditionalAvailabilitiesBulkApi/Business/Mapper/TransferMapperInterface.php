<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilitiesBulkApi\Business\Mapper;

use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityTransfer
     */
    public function toTransfer(array $data): ConditionalAvailabilityTransfer;

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityTransfer[]
     */
    public function toTransferCollection(array $data): array;
}
