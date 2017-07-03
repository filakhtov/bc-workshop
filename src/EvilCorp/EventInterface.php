<?php

namespace EvilCorp;

use JsonSerializable;

interface EventInterface extends JsonSerializable
{
    public function data(): array;
}
