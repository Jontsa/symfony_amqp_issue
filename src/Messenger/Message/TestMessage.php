<?php

namespace App\Messenger\Message;

final class TestMessage
{

    public function __construct(
        public readonly string $message,
        public readonly int $handleDelay,
        public readonly bool $handlerShouldFail
    )
    {}

}
