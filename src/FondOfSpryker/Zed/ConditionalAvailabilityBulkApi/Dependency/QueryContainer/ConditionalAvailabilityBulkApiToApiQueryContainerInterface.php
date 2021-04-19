<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\QueryContainer;

use Generated\Shared\Transfer\ApiItemTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

interface ConditionalAvailabilityBulkApiToApiQueryContainerInterface
{
    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $data
     * @param int|null $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function createApiItem(AbstractTransfer $data, ?int $id = null): ApiItemTransfer;
}
