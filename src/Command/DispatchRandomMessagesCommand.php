<?php

namespace App\Command;

use App\Message\TestMessageOne;
use App\Message\TestMessageThree;
use App\Message\TestMessageTwo;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:dispatch-random-messages',
    description: 'Dispatches 50 random messages to the message bus.',
)]
class DispatchRandomMessagesCommand extends Command
{
    public function __construct(private MessageBusInterface $messageBus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        for ($i = 1; $i <= 50; $i++) {
            $rand = random_int(1, 3);
            $messageClass = match ($rand) {
                1 => new TestMessageOne("Message 1 content #{$i}"),
                2 => new TestMessageTwo(),
                3 => new TestMessageThree(),
            };

            $this->messageBus->dispatch($messageClass);
        }

        $io->success('Successfully dispatched 50 random messages to the bus.');

        return Command::SUCCESS;
    }
}
