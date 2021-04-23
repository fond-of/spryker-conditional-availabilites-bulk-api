<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityBulkApi;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\Facade\ConditionalAvailabilityBulkApiToProductFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\Dependency\QueryContainer\ConditionalAvailabilityBulkApiToApiQueryContainerInterface;
use Spryker\Shared\Kernel\BundleProxy;
use Spryker\Zed\Api\Persistence\ApiQueryContainerInterface;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Kernel\Locator;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ConditionalAvailabilityBulkApiDependencyProviderTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Locator
     */
    protected $locatorMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Kernel\BundleProxy
     */
    protected $bundleProxyMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Api\Persistence\ApiQueryContainerInterface
     */
    protected $apiQueryContainerMock;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityBulkApi\ConditionalAvailabilityBulkApiDependencyProvider
     */
    protected $dependencyProvider;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->setMethodsExcept(['factory', 'set', 'offsetSet', 'get', 'offsetGet', 'has', 'offsetExists'])
            ->getMock();

        $this->locatorMock = $this->getMockBuilder(Locator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->bundleProxyMock = $this->getMockBuilder(BundleProxy::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityFacadeMock = $this->getMockBuilder(ConditionalAvailabilityFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productFacadeMock = $this->getMockBuilder(ProductFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiQueryContainerMock = $this->getMockBuilder(ApiQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->dependencyProvider = new ConditionalAvailabilityBulkApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->containerMock->expects(static::atLeastOnce())
            ->method('getLocator')
            ->willReturn($this->locatorMock);

        $this->locatorMock->expects(static::atLeastOnce())
            ->method('__call')
            ->withConsecutive(['conditionalAvailability'], ['product'], ['api'])
            ->willReturn($this->bundleProxyMock);

        $this->bundleProxyMock->expects(static::atLeastOnce())
            ->method('__call')
            ->withConsecutive(['facade'], ['facade'], ['queryContainer'])
            ->willReturnOnConsecutiveCalls(
                $this->conditionalAvailabilityFacadeMock,
                $this->productFacadeMock,
                $this->apiQueryContainerMock
            );

        $container = $this->dependencyProvider->provideBusinessLayerDependencies(
            $this->containerMock
        );

        static::assertEquals($this->containerMock, $container);

        static::assertInstanceOf(
            ConditionalAvailabilityBulkApiToConditionalAvailabilityFacadeInterface::class,
            $container[ConditionalAvailabilityBulkApiDependencyProvider::FACADE_CONDITIONAL_AVAILABILITY]
        );

        static::assertInstanceOf(
            ConditionalAvailabilityBulkApiToProductFacadeInterface::class,
            $container[ConditionalAvailabilityBulkApiDependencyProvider::FACADE_PRODUCT]
        );

        static::assertInstanceOf(
            ConditionalAvailabilityBulkApiToApiQueryContainerInterface::class,
            $container[ConditionalAvailabilityBulkApiDependencyProvider::QUERY_CONTAINER_API]
        );
    }
}
