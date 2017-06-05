<?php

namespace Tests\EvilCorp\Payments;

use EvilCorp\EventBusInterface;
use EvilCorp\Orders\Order;
use EvilCorp\Payments\PaymentService;
use EvilCorp\Payments\PaymentStatus;
use PHPUnit\Framework\TestCase;

class PaymentServiceTest extends TestCase
{
    private $paymentService;
    private $eventBusMock;

    protected function setUp()
    {
        parent::setUp();

        $eventBusProphecy = $this->prophesize(EventBusInterface::class);
        $this->eventBusMock = $eventBusProphecy->reveal();

        $this->paymentService = new PaymentService($this->eventBusMock);
    }

    /** @covers \EvilCorp\Payments\PaymentService::updatePaymentStatus */
    public function testUpdatePaymentStatus()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_OK);

        $orderProphecy = $this->prophesize(Order::class);
        $orderProphecy->setPaymentStatus($paymentStatus)->shouldBeCalled();
        $order = $orderProphecy->reveal();

        $this->paymentService->updatePaymentStatus($order, $paymentStatus);
    }

    /** @covers \EvilCorp\Payments\PaymentService::updatePaymentStatus */
    public function testUpdatePaymentStatusFails()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_ERROR);

        $orderProphecy = $this->prophesize(Order::class);
        $orderProphecy->setPaymentStatus($paymentStatus)->shouldNotBeCalled();
        $order = $orderProphecy->reveal();

        $this->paymentService->updatePaymentStatus($order, $paymentStatus);
    }

    /** @covers \EvilCorp\Payments\PaymentService::__construct() */
    public function testEventBusConstruction()
    {
        static::assertAttributeSame($this->eventBusMock, 'eventBus', $this->paymentService);
    }
}
