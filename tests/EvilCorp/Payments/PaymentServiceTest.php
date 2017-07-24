<?php

namespace Tests\EvilCorp\Payments;

use EvilCorp\EventBusInterface;
use EvilCorp\Orders\Order;
use EvilCorp\Payments\PaymentService;
use EvilCorp\Payments\PaymentStatus;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class PaymentServiceTest extends TestCase
{
    private $paymentService;
    private $eventBusMock;
    private $order;

    protected function setUp()
    {
        parent::setUp();

        $eventBusProphecy = $this->prophesize(EventBusInterface::class);
        $eventBusProphecy->publish(Argument::any())->willReturn($eventBusProphecy->reveal());

        $this->eventBusMock = $eventBusProphecy->reveal();

        $this->paymentService = new PaymentService($this->eventBusMock);
        $this->order = $this->prophesize(Order::class);
    }

    /** @covers \EvilCorp\Payments\PaymentService::updatePaymentStatus */
    public function testUpdatePaymentStatus()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_OK);

        $this->order->setPaymentStatus($paymentStatus)->shouldBeCalled();
        $this->order->id()->willReturn(123);

        $this->paymentService->updatePaymentStatus($this->order->reveal(), $paymentStatus);
    }

    /** @covers \EvilCorp\Payments\PaymentService::updatePaymentStatus */
    public function testUpdatePaymentStatusFails()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_ERROR);

        $this->order->setPaymentStatus($paymentStatus)->shouldNotBeCalled();

        $this->paymentService->updatePaymentStatus($this->order->reveal(), $paymentStatus);
    }

    /** @covers \EvilCorp\Payments\PaymentService::__construct() */
    public function testEventBusConstruction()
    {
        static::assertAttributeSame($this->eventBusMock, 'eventBus', $this->paymentService);
    }
}
