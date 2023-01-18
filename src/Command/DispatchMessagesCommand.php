<?php

namespace App\Command;

use App\Messenger\Message\TestMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand('app:dispatch', 'Send messages to queue')]
class DispatchMessagesCommand extends Command
{

    public function __construct(private readonly MessageBusInterface $bus, string $name = null)
    {
        parent::__construct($name);
    }

    public function execute(InputInterface $input, OutputInterface $output) : int
    {
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));
        $this->bus->dispatch(new TestMessage('Message with delay of 2', 2, false));

        $this->bus->dispatch(new TestMessage('Message with delay of 5 that should throw an exception', 5, true));

        return Command::SUCCESS;

    }

}
