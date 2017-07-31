<?php

namespace EvilCorp\Orders\Events;

interface OrderEventInterface
{
    public function getOrderId(): int;
}
