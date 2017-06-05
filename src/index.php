<?php

require_once implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'vendor', 'autoload.php']);

$order = new \EvilCorp\Orders\Order();
$paymentStatus = new EvilCorp\Payments\PaymentStatus(EvilCorp\Payments\PaymentStatus::STATUS_OK);
$paymentService = new \EvilCorp\Payments\PaymentService($order);
