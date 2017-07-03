<?php

namespace Tests\EvilCorp\Utilities;

use EvilCorp\Utilities\JsonHelper;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

class JsonHelperTest extends TestCase
{
    private $jsonHelper;

    protected function setUp()
    {
        parent::setUp();

        $this->jsonHelper = new JsonHelper();
    }

    public function testEncode()
    {
        $serializable = ['foo' => 'bar'];

        static::assertSame(json_encode($serializable), $this->jsonHelper->encode($serializable));
    }

    public function testFailureToEncodeThrows()
    {
        $a = new stdClass();
        $b = new stdClass();

        $a->b = $b;
        $b->a = $a;

        $this->expectException(LogicException::class);
        $this->jsonHelper->encode($a);
    }
}
