<?php

namespace EvilCorp\Utilities;

use LogicException;

class JsonHelper
{
    public function encode($serializable): string
    {
        $serialized = json_encode($serializable);

        if ($serialized === false) {
            throw new LogicException('Failed to encode provided data.');
        }

        return $serialized;
    }
}
