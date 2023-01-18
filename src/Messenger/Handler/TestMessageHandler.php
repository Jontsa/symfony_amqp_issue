<?php

namespace App\Messenger\Handler;

use App\Messenger\Message\TestMessage;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class TestMessageHandler implements LoggerAwareInterface
{

    use LoggerAwareTrait;

    public function __invoke(TestMessage $message) : void
    {

        $this->logger->info('Received new TestMessage. Simulate delay for ' . $message->handleDelay . ' seconds');
        if (0 < $message->handleDelay) {
            sleep($message->handleDelay);
        }

        if ($message->handlerShouldFail) {
            $this->logger->info('This message will now throw an exception');
            throw new \Exception('Message failed.');
        }
    }

}
