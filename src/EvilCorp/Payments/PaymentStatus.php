<?php

namespace EvilCorp\Payments;

use InvalidArgumentException;

class PaymentStatus
{
    const TRANSACTION_AUTHORIZE = 'authorize';
    const STATUS_OK = 'ok';
    const STATUS_ERROR = 'error';

    /** @var string */
    private $status;

    public function __construct(string $status)
    {
        if (!in_array($status, [self::STATUS_OK, self::STATUS_ERROR])) {
            throw new InvalidArgumentException("Invalid payment status: {$status}");
        }

        $this->status = $status;
    }

    public function transactionType(): string
    {
        return self::TRANSACTION_AUTHORIZE;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function isOk(): bool
    {
        return $this->status() === self::STATUS_OK;
    }
}
