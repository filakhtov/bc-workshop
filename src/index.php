<?php

require_once implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'vendor', 'autoload.php']);

$fileWrapper = new \EvilCorp\Utilities\FileWrapper();

$logger = new EvilCorp\Utilities\Logger(
    $fileWrapper,
    '/tmp/foo.log'
);

$jsonHelper = new \EvilCorp\Utilities\JsonHelper();

$order = new \EvilCorp\Orders\Order();
$paymentStatus = new EvilCorp\Payments\PaymentStatus(EvilCorp\Payments\PaymentStatus::STATUS_OK);

$eventBus = new EvilCorp\Utilities\EventBus([
    new EvilCorp\Utilities\EventHandlers\LogEventHandler($logger, $jsonHelper),
    //
]);

$paymentService = new \EvilCorp\Payments\PaymentService($eventBus);
