<?php

namespace EvilCorp\Orders;

use EvilCorp\Orders\Order;

interface OrderRepositoryInterface
{
    public function getById(int $id): Order;

    public function persist(Order $order);
}
