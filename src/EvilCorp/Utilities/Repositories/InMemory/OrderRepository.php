<?php

namespace EvilCorp\Utilities\Repositories\InMemory;

use EvilCorp\Orders\Order;
use EvilCorp\Orders\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    private $orders = [];

    public function getById(int $id): Order
    {
        if (!array_key_exists($id, $this->orders)) {
            $this->orders[$id] = new Order();
        }

        return $this->orders[$id];
    }

    public function persist(Order $order)
    {

    }
}
