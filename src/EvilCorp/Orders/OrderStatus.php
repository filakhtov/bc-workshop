<?php

namespace EvilCorp\Orders;

use InvalidArgumentException;

class OrderStatus
{
    const AWAITING_SHIPMENT = 3;

    /** @var int */
    private $status;

    public function __construct(int $status)
    {
        if (!in_array($status, [static::AWAITING_SHIPMENT])) {
            throw new InvalidArgumentException("Invalid status given: {$status}.");
        }

        $this->status = $status;
    }

    public function status(): int
    {
        return $this->status;
    }
}
